<?php

namespace Callmeaf\Notification\App\Http\Resources\Web\V1;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;

/**
 * @extends ResourceCollection<NotificationResource>
 */
class NotificationCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @return array<int|string, NotificationResource>
     */
    public function toArray(Request $request): array
    {
        return parent::toArray($request);
    }
}
