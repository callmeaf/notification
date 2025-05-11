<?php

use Callmeaf\Base\App\Enums\RequestType;

return [
    'model' => \Callmeaf\Notification\App\Models\Notification::class,
    'route_key_name' => 'id',
    'repo' => \Callmeaf\Notification\App\Repo\V1\NotificationRepo::class,
    'resources' => [
        RequestType::API->value => [
            'resource' => \Callmeaf\Notification\App\Http\Resources\Api\V1\NotificationResource::class,
            'resource_collection' => \Callmeaf\Notification\App\Http\Resources\Api\V1\NotificationCollection::class,
        ],
        RequestType::WEB->value => [
            'resource' => \Callmeaf\Notification\App\Http\Resources\Web\V1\NotificationResource::class,
            'resource_collection' => \Callmeaf\Notification\App\Http\Resources\Web\V1\NotificationCollection::class,
        ],
        RequestType::ADMIN->value => [
            'resource' => \Callmeaf\Notification\App\Http\Resources\Admin\V1\NotificationResource::class,
            'resource_collection' => \Callmeaf\Notification\App\Http\Resources\Admin\V1\NotificationCollection::class,
        ],
    ],
    'events' => [
        RequestType::API->value => [
            \Callmeaf\Notification\App\Events\Api\V1\NotificationIndexed::class => [
                // listeners
            ],
            \Callmeaf\Notification\App\Events\Api\V1\NotificationCreated::class => [
                // listeners
            ],
            \Callmeaf\Notification\App\Events\Api\V1\NotificationShowed::class => [
                // listeners
            ],
            \Callmeaf\Notification\App\Events\Api\V1\NotificationUpdated::class => [
                // listeners
            ],
            \Callmeaf\Notification\App\Events\Api\V1\NotificationDeleted::class => [
                // listeners
            ],
            \Callmeaf\Notification\App\Events\Api\V1\NotificationStatusUpdated::class => [
                // listeners
            ],
            \Callmeaf\Notification\App\Events\Api\V1\NotificationTypeUpdated::class => [
                // listeners
            ],
        ],
        RequestType::WEB->value => [
            \Callmeaf\Notification\App\Events\Web\V1\NotificationIndexed::class => [
                // listeners
            ],
            \Callmeaf\Notification\App\Events\Web\V1\NotificationCreated::class => [
                // listeners
            ],
            \Callmeaf\Notification\App\Events\Web\V1\NotificationShowed::class => [
                // listeners
            ],
            \Callmeaf\Notification\App\Events\Web\V1\NotificationUpdated::class => [
                // listeners
            ],
            \Callmeaf\Notification\App\Events\Web\V1\NotificationDeleted::class => [
                // listeners
            ],
            \Callmeaf\Notification\App\Events\Web\V1\NotificationStatusUpdated::class => [
                // listeners
            ],
            \Callmeaf\Notification\App\Events\Web\V1\NotificationTypeUpdated::class => [
                // listeners
            ],
        ],
        RequestType::ADMIN->value => [
            \Callmeaf\Notification\App\Events\Admin\V1\NotificationIndexed::class => [
                // listeners
            ],
            \Callmeaf\Notification\App\Events\Admin\V1\NotificationCreated::class => [
                // listeners
            ],
            \Callmeaf\Notification\App\Events\Admin\V1\NotificationShowed::class => [
                // listeners
            ],
            \Callmeaf\Notification\App\Events\Admin\V1\NotificationUpdated::class => [
                // listeners
            ],
            \Callmeaf\Notification\App\Events\Admin\V1\NotificationDeleted::class => [
                // listeners
            ],
            \Callmeaf\Notification\App\Events\Admin\V1\NotificationStatusUpdated::class => [
                // listeners
            ],
            \Callmeaf\Notification\App\Events\Admin\V1\NotificationTypeUpdated::class => [
                // listeners
            ],
        ],
    ],
    'requests' => [
        RequestType::API->value => [
            'index' => \Callmeaf\Notification\App\Http\Requests\Api\V1\NotificationIndexRequest::class,
            'store' => \Callmeaf\Notification\App\Http\Requests\Api\V1\NotificationStoreRequest::class,
            'show' => \Callmeaf\Notification\App\Http\Requests\Api\V1\NotificationShowRequest::class,
            'update' => \Callmeaf\Notification\App\Http\Requests\Api\V1\NotificationUpdateRequest::class,
            'destroy' => \Callmeaf\Notification\App\Http\Requests\Api\V1\NotificationDestroyRequest::class,
            'statusUpdate' => \Callmeaf\Notification\App\Http\Requests\Api\V1\NotificationStatusUpdateRequest::class,
            'typeUpdate' => \Callmeaf\Notification\App\Http\Requests\Api\V1\NotificationTypeUpdateRequest::class,
            'read' => \Callmeaf\Notification\App\Http\Requests\Api\V1\NotificationReadRequest::class,
            'allRead' => \Callmeaf\Notification\App\Http\Requests\Api\V1\NotificationAllReadRequest::class,
            'allUnreadCount' => \Callmeaf\Notification\App\Http\Requests\Api\V1\NotificationAllUnreadCountRequest::class,
        ],
        RequestType::WEB->value => [
            'index' => \Callmeaf\Notification\App\Http\Requests\Web\V1\NotificationIndexRequest::class,
            'create' => \Callmeaf\Notification\App\Http\Requests\Web\V1\NotificationCreateRequest::class,
            'store' => \Callmeaf\Notification\App\Http\Requests\Web\V1\NotificationStoreRequest::class,
            'show' => \Callmeaf\Notification\App\Http\Requests\Web\V1\NotificationShowRequest::class,
            'edit' => \Callmeaf\Notification\App\Http\Requests\Web\V1\NotificationEditRequest::class,
            'update' => \Callmeaf\Notification\App\Http\Requests\Web\V1\NotificationUpdateRequest::class,
            'destroy' => \Callmeaf\Notification\App\Http\Requests\Web\V1\NotificationDestroyRequest::class,
            'statusUpdate' => \Callmeaf\Notification\App\Http\Requests\Web\V1\NotificationStatusUpdateRequest::class,
            'typeUpdate' => \Callmeaf\Notification\App\Http\Requests\Web\V1\NotificationTypeUpdateRequest::class,
        ],
        RequestType::ADMIN->value => [
            'index' => \Callmeaf\Notification\App\Http\Requests\Admin\V1\NotificationIndexRequest::class,
            'store' => \Callmeaf\Notification\App\Http\Requests\Admin\V1\NotificationStoreRequest::class,
            'show' => \Callmeaf\Notification\App\Http\Requests\Admin\V1\NotificationShowRequest::class,
            'update' => \Callmeaf\Notification\App\Http\Requests\Admin\V1\NotificationUpdateRequest::class,
            'destroy' => \Callmeaf\Notification\App\Http\Requests\Admin\V1\NotificationDestroyRequest::class,
            'statusUpdate' => \Callmeaf\Notification\App\Http\Requests\Admin\V1\NotificationStatusUpdateRequest::class,
            'typeUpdate' => \Callmeaf\Notification\App\Http\Requests\Admin\V1\NotificationTypeUpdateRequest::class,
        ],
    ],
    'controllers' => [
        RequestType::API->value => [
            'notification' => \Callmeaf\Notification\App\Http\Controllers\Api\V1\NotificationController::class,
        ],
        RequestType::WEB->value => [
            'notification' => \Callmeaf\Notification\App\Http\Controllers\Web\V1\NotificationController::class,
        ],
        RequestType::ADMIN->value => [
            'notification' => \Callmeaf\Notification\App\Http\Controllers\Admin\V1\NotificationController::class,
        ],
    ],
    'routes' => [
        RequestType::API->value => [
            'prefix' => 'notifications',
            'as' => 'notifications.',
            'middleware' => [
                'auth:sanctum'
            ],
        ],
        RequestType::WEB->value => [
            'prefix' => 'notifications',
            'as' => 'notifications.',
            'middleware' => [],
        ],
        RequestType::ADMIN->value => [
            'prefix' => 'notifications',
            'as' => 'notifications.',
            'middleware' => [
                'auth:sanctum',
                'role:' . \Callmeaf\Role\App\Enums\RoleName::SUPER_ADMIN->value,
            ],
        ],
    ],
    'enums' => [
         'status' => \Callmeaf\Notification\App\Enums\NotificationStatus::class,
         'type' => \Callmeaf\Notification\App\Enums\NotificationType::class,
    ],
     'exports' => [
        RequestType::API->value => [
            'excel' => \Callmeaf\Notification\App\Exports\Api\V1\NotificationsExport::class,
        ],
        RequestType::WEB->value => [
            'excel' => \Callmeaf\Notification\App\Exports\Web\V1\NotificationsExport::class,
        ],
        RequestType::ADMIN->value => [
            'excel' => \Callmeaf\Notification\App\Exports\Admin\V1\NotificationsExport::class,
        ],
     ],
     'imports' => [
         RequestType::API->value => [
             'excel' => \Callmeaf\Notification\App\Imports\Api\V1\NotificationsImport::class,
         ],
         RequestType::WEB->value => [
             'excel' => \Callmeaf\Notification\App\Imports\Web\V1\NotificationsImport::class,
         ],
         RequestType::ADMIN->value => [
             'excel' => \Callmeaf\Notification\App\Imports\Admin\V1\NotificationsImport::class,
         ],
     ],
];
