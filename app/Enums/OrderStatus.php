<?php

namespace App\Enums;

use BenSampo\Enum\Enum;

final class OrderStatus extends Enum
{
    const Pending = 'pending';
    const Accepted = 'accepted';
    const Completed = 'completed';
    const Cancelled = 'cancelled';
    const AssignedToRider = 'assigned-to-rider';
}
