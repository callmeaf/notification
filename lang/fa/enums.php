<?php

use Callmeaf\Notification\App\Enums\NotificationStatus;
use Callmeaf\Notification\App\Enums\NotificationType;

return [
    NotificationStatus::class => [
        NotificationStatus::ACTIVE->name => 'Active',
        NotificationStatus::INACTIVE->name => 'InActive',
        NotificationStatus::PENDING->name => 'Pending',
    ],
    NotificationType::class => [
        //
    ],
];
