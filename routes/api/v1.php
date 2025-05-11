<?php

use Illuminate\Support\Facades\Route;

[
    $controllers,
    $prefix,
    $as,
    $middleware,
] = Base::getRouteConfigFromRepo(repo: \Callmeaf\Notification\App\Repo\Contracts\NotificationRepoInterface::class);

Route::apiResource($prefix, $controllers['notification'])->only([
    'index',
    'show'
])->middleware($middleware);
 Route::prefix($prefix)->as($as)->middleware($middleware)->controller($controllers['notification'])->group(function () {
     Route::get('/all/unread_count','allUnreadCount');
     Route::patch('/all/read','allRead');
     Route::prefix('{notification}')->group(function () {
         Route::patch('/read', 'read');
     });
 });
