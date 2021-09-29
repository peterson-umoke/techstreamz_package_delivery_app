<?php


namespace App\Library;


use App\Models\User as Guest;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Relations\MorphMany;

abstract class PaymentGateway
{
    /**
     * @var Guest|Authenticatable|null
     */
    protected $user;

    /**
     * @var mixed|string
     */
    protected $email;

    /**
     * @var mixed|string|null
     */
    protected $first_name;

    /**
     * @var mixed|string|null
     */
    protected $last_name;

    /**
     * @var int|mixed
     */
    protected $userId;

    /**
     * @var mixed|string|null
     */
    protected $phone_mobile;

    /**
     * @var MorphMany
     */
    protected MorphMany $payments;

    /**
     * @var array|false|string
     */
    protected $token;
    /**
     * the app default currency
     * @var mixed
     */
    protected $currency;

    public function __construct($secretKey)
    {
        $this->token = $secretKey;
        $this->user = auth('guest')->user();
        $this->currency = env('CURRENCY', 'NGN');
        if (!empty($this->user)) {
            $this->email = $this->user->email;
            $this->first_name = $this->user->first_name;
            $this->last_name = $this->user->last_name;
            $this->userId = $this->user->id;
            $this->phone_mobile = $this->user->phone_mobile;
            $this->payments = $this->user->payments();
        }
    }

    /**
     * used to update the amount on the wallet
     * @param $amount
     */
    protected function updateWallet($amount): void
    {
        $this->user->available_balance += $amount;
        $this->user->ledger_balance += $amount;
        $this->user->save();
    }

    /**
     * used to generate payment reference
     * @return false|string
     */
    protected function generateReference(): string
    {
        $str = "1234567890ABCDEFGHIKLAOXQZPMEW";
        return substr(str_shuffle($str), 0, 10);
    }
}
