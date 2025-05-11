<?php

namespace Callmeaf\Notification\App\Events\Web\V1;

use Callmeaf\Notification\App\Models\Notification;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class NotificationTrashed
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    /**
     * @param Collection<Notification> $notifications
     * Create a new event instance.
     */
    public function __construct(Collection $notifications)
    {
        //
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return array<int, \Illuminate\Broadcasting\Channel>
     */
    public function broadcastOn(): array
    {
        return [
            new PrivateChannel('channel-name'),
        ];
    }
}
