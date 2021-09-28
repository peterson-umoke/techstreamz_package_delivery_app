<?php

namespace App\Library;

use Fouladgar\MobileVerification\Contracts\SMSClient as SmsClientContract;
use Fouladgar\MobileVerification\Notifications\Messages\Payload;

class PhoneVerificationSmsClient implements SmsClientContract
{

    public function sendMessage(Payload $payload)
    {
        // TODO: Implement sendMessage() method.
    }
}
