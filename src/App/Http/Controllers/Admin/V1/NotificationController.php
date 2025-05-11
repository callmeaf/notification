<?php

namespace Callmeaf\Notification\App\Http\Controllers\Admin\V1;

use Callmeaf\Base\App\Http\Controllers\Admin\V1\AdminController;
use Callmeaf\Notification\App\Repo\Contracts\NotificationRepoInterface;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;

class NotificationController extends AdminController implements HasMiddleware
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
        return $this->notificationRepo->latest()->search()->paginate();
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
        return $this->notificationRepo->findById(value: $id);
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
}
