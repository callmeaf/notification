<?php

namespace Callmeaf\Notification\App\Repo\Contracts;

use Callmeaf\Base\App\Repo\Contracts\BaseRepoInterface;
use Callmeaf\Notification\App\Models\Notification;
use Callmeaf\Notification\App\Http\Resources\Api\V1\NotificationCollection;
use Callmeaf\Notification\App\Http\Resources\Api\V1\NotificationResource;

/**
 * @extends BaseRepoInterface<Notification,NotificationResource,NotificationCollection>
 */
interface NotificationRepoInterface extends BaseRepoInterface
{
    public function allUnreadCount(): int;
    /**
     * @return NotificationCollection
     */
    public function allRead();

    /**
     * @param string $id
     * @return NotificationResource
     */
    public function read(string $id);
}
