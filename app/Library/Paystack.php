<?php

namespace App\Library;

//use App\Enums\PaymentGroup;
//use App\Enums\PaymentStatus;
//use App\Models\Payment;
use Http;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;

class Paystack extends PaymentGateway
{
    /**
     * the base url
     * @var string
     */
    private string $url = "https://api.paystack.co";

    /**
     * store the transfer recipients
     * @var Collection
     */
    private Collection $transferRecipients;

    /**
     * Flutterwave constructor.
     */
    public function __construct()
    {
        parent::__construct(getenv('PAYSTACK_SECRET_KEY'));
        $this->transferRecipients = Collection::make([]);
    }

    /**
     * @param $amount
     * @param string $currency
     * @param string $callback_url
     * @return string|null
     */
    public function getRedirectionUrl($amount, string $currency = 'NGN', string $callback_url = ""): string
    {
        $paymentData = [
            'amount' => $amount * 100,
            'reference' => $this->generateReference(),
            'email' => $this->email,
            'currency' => $currency,
            "first_name" => $this->first_name,
            "last_name" => $this->last_name,
            "callback_url" => $callback_url ?? route('portal.ipn.paystack'),
            'metadata' => [
                'contributor_id' => $this->userId,
            ],
        ];


        $response = Http::withToken($this->token)->post(sprintf('%s/transaction/initialize', $this->url), $paymentData);
        return $response->json('data')['authorization_url'];
    }

    /**
     * @param $request
     * @return bool|array
     */
    public function verifyTransaction($request)
    {
        $response = Http::withToken($this->token)->get(sprintf('%s/transaction/verify/%s', $this->url, $request->query('trxref')))->json();
        $isSuccessful = $response['message'] === 'Verification successful';
        $data = $response['data'];

        if ($isSuccessful && $this->email === $data['customer']['email'] && $data['status'] === 'success') {
            return $data;
        }

        return false;
    }

    /**
     * create transfer client
     * @return array|null
     */
    private function createTransferRecipient(): ?array
    {
        $data = $this->getTransferRecipients()->first();

        $json = Http::withToken($this->token)->post(sprintf('%s/transferrecipient', $this->url), $data)->json();
        if ($json['message'] === 'Transfer recipient created successfully') {
            return [
                'recipient_code' => $json['data']['recipient_code'],
                'amount' => $data['amount'],
                'reason' => $data['description'],
            ];
        }

        return null;
    }

    /**
     * single transfer
     * @return mixed|null
     */
    public function transfer()
    {
        $trxRecipient = $this->createTransferRecipient();
        $json = Http::withToken($this->token)->post(sprintf('%s/transfer', $this->url), [
            "source" => "balance",
            "reason" => $trxRecipient['reason'],
            "amount" => $trxRecipient['amount'],
            "recipient" => $trxRecipient['recipient_code']
        ])->json();

        if ($json['message'] === 'Transfer has been queued') {
            // clear the transfer recipients
            $this->resetTransferRecipients();
            return $json['data'];
        }

        return null;
    }

    /**
     * create bulk transfer recipient
     * @return mixed|null
     */
    private function createBulkTransferRecipient()
    {
        $json = Http::withToken($this->token)->post(sprintf('%s/transferrecipient/bulk', $this->url), [
            'batch' => $this->getTransferRecipients(),
        ])->json();
        return $json['message'] === 'Recipients added successfully' ? $json['data']['success'] : $json['data']['errors'];
    }

    /**
     * used to bulk transfer funds to users
     * @return array|null
     */
    public function bulkTransfer(): ?array
    {
        $recipients = $this->createBulkTransferRecipient();
        $rawTransferData = $this->getTransferRecipients();
        $bulkTransferData = Collection::make([]);

        // process and compile the transfer data information
        foreach ($recipients as $index => $recipient) {
            $currentIndex = $rawTransferData[$index];
            if ($recipient['details']['account_number'] === $currentIndex['account_number']) {
                $bulkTransferData->push([
                    "amount" => $currentIndex['amount'],
                    "recipient" => $recipient['recipient_code'],
                ]);
            }
        }

        $json = Http::withToken($this->token)->post(sprintf('%s/transfer/bulk', $this->url), [
            'currency' => $this->currency ?? "NGN",
            'source' => 'balance',
            'transfers' => $bulkTransferData->toArray(),
        ])->json();


        if ($json['message'] === sprintf('%s transfers queued.', count($bulkTransferData))) {
            $this->resetTransferRecipients();
            return $json['data'];
        }

        return null;
    }

    /**
     * get the transfer recipients
     * @return Collection
     */
    public function getTransferRecipients(): Collection
    {
        return $this->transferRecipients;
    }

    /**
     * use this to compile a list of transfer receipts
     * @param string $name
     * @param string $bank_account_number
     * @param string $bank_sort_code
     * @param int $amount
     * @param string $currency
     * @param string|null $description
     * @return Paystack
     */
    public function setTransferRecipients(string $name, string $bank_account_number, string $bank_sort_code, int $amount = 0, string $currency = 'NGN', string $description = null): Paystack
    {
        $this->transferRecipients->push([
            "type" => "nuban",
            "name" => $name,
            "account_number" => $bank_account_number,
            "bank_code" => $bank_sort_code,
            'currency' => $currency ?? "NGN",
            "description" => $description,
            'amount' => $amount * 100,
        ]);

        return $this;
    }

    /**
     * Reset the transfer receipts
     * @return void
     */
    private function resetTransferRecipients(): void
    {
        $this->transferRecipients = collect([]);
    }

    /**
     * used to list all the banks registered
     * @return Collection|null
     */
    public function listBanks(): ?Collection
    {
        $json = Http::withToken($this->token)->get(sprintf('%s/bank', $this->url))->json();
        return $json['message'] === 'Banks retrieved' ?
            collect($json['data'])->transform(function ($x) {
                return [
                    'bank_name' => $x['name'],
                    'code' => $x['code'],
                ];
            })
            : null;
    }

    /**
     * used to check balance of account
     * @return mixed|null
     */
    public function checkBalance()
    {
        $json = Http::withToken($this->token)->get(sprintf('%s/balance', $this->url))->json();
        return $json['message'] === 'Balances retrieved' ? $json['data'][0]['balance'] : null;
    }

    /**
     * used to verify account number
     * @param $sortCode
     * @param $accountNumber
     * @return string|null
     */
    public function resolveAccountNumber($sortCode, $accountNumber): ?string
    {
        $json = Http::withToken($this->token)->get(sprintf('%s/bank/resolve', $this->url), [
            'account_number' => $accountNumber,
            'bank_code' => $sortCode
        ])->json();
        return $json['message'] === 'Account number resolved' ? $json['data']['account_name'] : null;
    }

    public function processWithdrawals($payment): void
    {
        $payment
            ->chunkById(1000, function ($payments) {
                foreach ($payments as $payment) {
                    $reference = $payment->code;
                    $guest = $payment->payable;

                    $this->setTransferRecipients($reference, $guest->bank_account_number, $guest->bank_sort_code, $payment->amount, $this->currency, 'MIBAC Withdrawal Request');
                }

//                $bulkTransferData = Collection::make([]);
//                foreach ($this->createBulkTransferRecipient() as $receipt) {
//                    $pym = Payment::whereCode($receipt['name']);
//
//                    if (!empty($pym->exists())) {
//                        $model = $pym->first();
//                        $recipient_code = $receipt['recipient_code'];
//                        $bulkTransferData->push([
//                            'amount' => (int)$model->amount * 100,
//                            'reference' => $model->code,
//                            'recipient' => $recipient_code,
//                        ]);
//
//                        // adding the meta for the transfer code
//                        $model->replaceMeta(
//                            'recipient_code',
//                            $recipient_code
//                        );
//
//                        // adjust the payment as spooled
//
//                    }
//                }

                $this->bulkTransfer();
            });
    }

//    /**
//     * @param $data
//     * @param $group
//     * @return Model
//     */
//    public function createSuccessfulPayment($data, $group): Model
//    {
//        return $this->payments->create([
//            'amount' => $data['amount'] / 100,
//            'status' => PaymentStatus::Successful(),
//            'group' => $group,
//            'code' => $data['reference']
//        ]);
//    }
//
//    /**
//     * @param $request
//     * @return bool
//     */
//    public function confirmDeposit($request): bool
//    {
//        $data = $this->verifyTransaction($request);
//
//        if (!empty($data)) {
//            $payment = $this->createSuccessfulPayment($data, PaymentGroup::Deposits());
//
//            $this->updateWallet($payment->amount);
//
//            session()->flash('success', 'Deposit Successful');
//
//            return true;
//        }
//
//        session()->flash('error', 'Deposit Failed');
//
//        return false;
//    }
}
