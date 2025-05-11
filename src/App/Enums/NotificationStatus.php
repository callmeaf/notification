<?php

namespace Callmeaf\Notification\App\Enums;


use Callmeaf\Base\App\Enums\BaseStatus;

enum NotificationStatus: string
{
    case ACTIVE = BaseStatus::ACTIVE->value;
    case INACTIVE = BaseStatus::INACTIVE->value;
    case PENDING = BaseStatus::PENDING->value;
}
