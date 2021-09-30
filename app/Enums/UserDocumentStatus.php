<?php

namespace App\Enums;

use BenSampo\Enum\Enum;

final class UserDocumentStatus extends Enum
{
    const Pending =   'pending';
    const Confirmed = 'confirmed';
    const Rejected =   'rejected';
}
