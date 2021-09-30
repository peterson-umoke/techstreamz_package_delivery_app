<?php

namespace App\Enums;

use BenSampo\Enum\Enum;

final class DriverResponse extends Enum
{
    const Accept = 'accept';
    const Cancel = 'cancel';
    const Pending = 'pending';
}
