<?php

namespace App\Enums;

use BenSampo\Enum\Enum;

final class CouponTypes extends Enum
{
    const Android =   'android';
    const Web =   'web';
    const IOS = 'ios';
    const Desktop = 'desktop';
    const All = 'all';
}
