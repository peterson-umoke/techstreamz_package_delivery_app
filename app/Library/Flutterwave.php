<?php


namespace App\Library;


//use App\Enums\PaymentGroup;
//use App\Enums\PaymentStatus;
use App\Models\Meta;
//use App\Models\Payment;
use Http;
use Illuminate\Support\Collection;

class Flutterwave extends PaymentGateway
{
    /**
     * @var string
     */
    private string $url = "https://api.flutterwave.com/v3";

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
        parent::__construct(getenv('FLUTTERWAVE_SECRET_KEY'));
        $this->transferRecipients = Collection::make([]);
    }


    /**
     * @param $amount
     * @param string $currency
     * @param string|null $callback_url
     * @return string
     */
    public function getRedirectionUrl($amount, string $currency = 'NGN', string $callback_url = null): string
    {
//        $payment = $this->payments->create([
//            'amount' => $amount, // convert back to naira
//            'group' => PaymentGroup::Deposits()
//        ]);

        $paymentData = [
            'amount' => $amount,
            'tx_ref' => $this->generateReference(),
            'currency' => $currency,
            'payment_options' => 'card, ussd,banktransfer,account,credit,paga,payattitude,barter,mobilemoneyghana,qr',
            "redirect_url" => $callback_url ?? route('portal.ipn.flutterwave'),
            'customer' => [
                'email' => $this->email,
                'phonenumber' => $this->phone_mobile,
                'name' => $this->user->name,
            ],
            'meta' => [
                'contributor_id' => $this->userId,
            ],
        ];

        $response = Http::withToken($this->token)->post(sprintf('%s/payments', $this->url), $paymentData);
        return $response->json('data')['link'];
    }

    /**
     * @param $request
     * @return bool
     */
    public function verifyTransaction($request): bool
    {
        if ($request->exists('tx_ref') && !$request->exists('transaction_id')) {
//            $payment = $this->payments->firstWhere([
//                'code' => $request->tx_ref,
//                'group' => PaymentGroup::Deposits()
//            ]);
//
//            $payment->status = PaymentStatus::Cancelled();
//            $payment->save();

            session()->flash('error', 'Transaction Cancelled');

            return false;
        }

        $response = Http::withToken($this->token)->get(sprintf("%s/transactions/%s/verify", $this->url, $request->transaction_id))->json('data');
//        $payment = $this->payments->firstWhere([
//            'code' => $response['tx_ref'],
//            'amount' => $response['amount'], // convert back to naira
//            'group' => PaymentGroup::Deposits()
//        ]);


        if ($this->user->email === $response['customer']['email'] && $response['status'] === 'successful') {
//            $payment->status = PaymentStatus::Successful();
//            $payment->save();
//
//            $this->user->available_balance += $payment->amount;
//            $this->user->ledger_balance += $payment->amount;
//            $this->user->save();

            session()->flash('success', 'Deposit Successful');

            return true;
        }

//        $payment->status = PaymentStatus::Failed();
//        $payment->save();

        session()->flash('error', 'Deposit Failed');

        return false;
    }

    /**
     * @param string|null $title
     * @return mixed|null
     */
    public function bulkTransfer(string $title = null)
    {
        $response = Http::withToken($this->token)->post(sprintf("%s/bulk-transfers", $this->url), [
            'bulk_data' => $this->getTransferRecipients()->toArray(),
            'title' => $title,
        ])->json();
        return $response['message'] === 'Transfer Queued Successfully' ? $response['data'] : null;
    }

    /**
     * use to send single transfer
     * @return mixed|null
     */
    public function transfer()
    {
        $data = $this->getTransferRecipients()->first();

        $response = Http::withToken($this->token)->post(sprintf("%s/transfers", $this->url), $data)->json();
        return $response['message'] === 'Bulk transfer queued' ? $response['data'] : null;
    }

    /**
     * used to retry a failed transfer
     * @param $transferId
     * @return mixed|null
     */
    public function retryFailedTransfers($transferId)
    {
        $response = Http::withToken($this->token)->post(sprintf("%s/transfers/%s/retries", $this->url, $transferId))->json();
        return $response['message'] === 'Transfer retry attempt queued.' ? $response['data'] : null;
    }

    public function verifyBulkTransfer($reference)
    {
        $response = Http::withToken($this->token)->get(sprintf("%s/transfers?$reference", $this->url))->json();
        return $response['message'] === 'Transfer fetched.' ? $response['data'] : null;
    }

    /**
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
     * @param null $amount
     * @param string $currency
     * @param string $description
     * @return void
     */
    public function setTransferRecipients(string $name, string $bank_account_number, string $bank_sort_code, $amount = null, string $currency = 'NGN', string $description = ""): void
    {
        $this->transferRecipients->push([
            "amount" => (int)$amount,
            "account_number" => $bank_account_number,
            "account_bank" => $bank_sort_code,
            'currency' => $currency,
            "narration" => $description,
            "reference" => $name,
        ]);
    }

    /**
     * used to list all the banks registered
     * @param string $country
     * @return Collection|null
     */
    public function listBanks(string $country = "NG"): ?Collection
    {
        $json = Http::withToken($this->token)->get(sprintf('%s/banks/%s', $this->url, $country))->json();
        return $json['message'] === 'Banks fetched successfully' ?
            collect($json['data'])->transform(function ($x) {
                return [
                    'bank_name' => $x['name'],
                    'code' => $x['code'],
                ];
            })
            : null;
    }

    /**
     * get the account balance
     * @param string $country
     * @return int|null
     */
    public function checkBalance(string $country = "NGN"): ?int
    {
        $json = Http::withToken($this->token)->get(sprintf('%s/balances/%s', $this->url, $country))->json();
        return $json['message'] === 'Wallet balance fetched' ?
            $json['data']['available_balance']
            : null;
    }

    /**
     * used to verify account number
     * @param $sortCode
     * @param $accountNumber
     * @return string|null
     */
    public function resolveAccountNumber($sortCode, $accountNumber): ?string
    {
        $json = Http::withToken($this->token)->post(sprintf('%s/accounts/resolve', $this->url), [
            'account_number' => $accountNumber,
            'bank_code' => $sortCode
        ])->json();
        return $json['message'] === 'Account details fetched' ? $json['data']['account_name'] : null;
    }

//    public function processWithdrawals(Payment $payment): void
//    {
//        $payment
//            ->chunkById(1000, function ($payments) {
//                foreach ($payments as $payment) {
//                    $reference = $payment->code;
//                    $guest = $payment->payable;
//
//                    $payment->status = PaymentStatus::Spooled();
//                    $payment->save();
//
//                    $this->setTransferRecipients($reference, $guest->bank_account_number, $guest->bank_sort_code, $payment->amount, $this->currency, 'MIBAC Withdrawal Request');
//                }
//
//                $response = $this->bulkTransfer('MIBAC Batch Transfer Withdrawal');
//                $meta = new Meta();
//                $meta->key = 'bulk_transfer_report';
//
//                if (!empty($response) && !empty($response['id'])) {
//                    $meta->value = $response;
//                    $this->verifyBulkTransfer($response['id']);
//                } else {
//                    $meta->value = 'bulk_transfer_report';
//                }
//                $meta->save();
//            });
//    }
}
