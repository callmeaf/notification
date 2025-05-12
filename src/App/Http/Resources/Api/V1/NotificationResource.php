<?php

namespace Callmeaf\Notification\App\Http\Resources\Api\V1;

use Callmeaf\Base\App\Enums\DateTimeFormat;
use Callmeaf\Notification\App\Models\Notification;
use Callmeaf\User\App\Repo\Contracts\UserRepoInterface;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @property-read Notification $resource
 */
class NotificationResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        /**
         * @var UserRepoInterface $userRepo
         */
        $userRepo = app(UserRepoInterface::class);
        return [
            'id' => $this->id,
//            'sender_id' => $this->sender_id,
            'type' => $this->type,
//            'notifiable_type' => $this->notifiable_type,
//            'notifiable_id' => $this->notifiable_id,
            'data_json' => $this->data,
            'read_at' => $this->read_at,
            'read_at_text' => $this->readAtText(DateTimeFormat::DATE_TIME),
            'created_at' => $this->created_at,
            'created_at_text' => $this->createdAtText(DateTimeFormat::DATE_TIME),
            'updated_at' => $this->updated_at,
            'updated_at_text' => $this->updatedAtText(DateTimeFormat::DATE_TIME),
            'deleted_at' => $this->deleted_at,
            'deleted_at_text' => $this->deletedAtText(),
            'sender' => $userRepo->toResource($this->whenLoaded('sender')),
        ];
    }
}
