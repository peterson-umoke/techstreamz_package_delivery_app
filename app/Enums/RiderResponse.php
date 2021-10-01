<?php

namespace App\Enums;

use BenSampo\Enum\Enum;

final class RiderResponse extends Enum
{
    const Accept = 'accept';
    const Cancel = 'cancel';
    const Pending = 'pending';
}
