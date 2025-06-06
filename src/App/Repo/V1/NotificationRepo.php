<?php

namespace Callmeaf\Notification\App\Repo\V1;

use App\Models\User;
use Callmeaf\Base\App\Repo\V1\BaseRepo;
use Callmeaf\Notification\App\Models\Notification;
use Callmeaf\Notification\App\Repo\Contracts\NotificationRepoInterface;
use Illuminate\Support\Facades\Auth;

class NotificationRepo extends BaseRepo implements NotificationRepoInterface
{
    public function allUnreadCount(): int
    {
        return $this->authUser()->unreadNotifications()->count();
    }

    public function allRead()
    {
        $authUser = $this->authUser();
        $unreadNotifications = $authUser->unreadNotifications;
        $unreadNotifications->markAsRead();

        return $this->toResourceCollection($unreadNotifications);
    }

    public function read(string $id)
    {
        /**
         * @var Notification $notification
         */
        $notification = $this->authUser()->unreadNotifications()->findOrFail($id);
        $notification->markAsRead();

        return $this->toResource($notification->loadMissing('sender'));
    }

    /**
     * @return User
     */
    private function authUser()
    {
        return Auth::user();
    }
}
