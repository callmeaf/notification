<?php

namespace Callmeaf\Notification\App\Http\Controllers\Api\V1;

use App\Models\User;
use Callmeaf\Base\App\Http\Controllers\Api\V1\ApiController;
use Callmeaf\Notification\App\Repo\Contracts\NotificationRepoInterface;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Routing\Controllers\HasMiddleware;

class NotificationController extends ApiController implements HasMiddleware
{
    public function __construct(protected NotificationRepoInterface $notificationRepo)
    {
        parent::__construct($this->notificationRepo->config);
    }

    public static function middleware(): array
    {
        return [
           //
        ];
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        /**
         * @var User $user
         */
        $user = $this->request->user();
        $notificationsIds = $user->notifications()->pluck('id')->toArray();
        return $this->notificationRepo->builder(fn(Builder $query) => $query->whereIn('id',$notificationsIds)->with('sender'))->latest()->search()->paginate();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store()
    {
        return $this->notificationRepo->create(data: $this->request->validated());
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return $this->notificationRepo->builder(fn(Builder $query) => $query->with('sender'))->findById(value: $id);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(string $id)
    {
        return $this->notificationRepo->update(id: $id, data: $this->request->validated());
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        return $this->notificationRepo->delete(id: $id);
    }

    public function statusUpdate(string $id)
    {
        return $this->notificationRepo->update(id: $id, data: $this->request->validated());
    }

    public function typeUpdate(string $id)
    {
        return $this->notificationRepo->update(id: $id, data: $this->request->validated());
    }

    public function trashed()
    {
        return $this->notificationRepo->trashed()->latest()->search()->paginate();
    }

    public function restore(string $id)
    {
        return $this->notificationRepo->restore(id: $id);
    }

    public function forceDestroy(string $id)
    {
        return $this->notificationRepo->forceDelete(id: $id);
    }

    public function allUnreadCount()
    {
        return response()->json([
            'unread_count' => $this->notificationRepo->allUnreadCount(),
        ]);
    }

    public function allRead()
    {
        return $this->notificationRepo->allRead();
    }

    public function read(string $id)
    {
        return $this->notificationRepo->read($id);
    }
}
