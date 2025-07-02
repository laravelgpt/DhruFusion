<?php

use Illuminate\Support\Facades\Route;
use laravelgpt\DhruFusion\Http\Controllers;
use laravelgpt\DhruFusion\Http\Controllers\DhruController;

Route::namespace(Controllers::class)->prefix('admin')
->middleware(['web', 'auth:admin', 'admin', 'verified', 'throttle:30,1'])
->group(function () {
    //api key genrate and modify here
    Route::apiResource('/dhru/api/key', ApiKeyController::class);
});

Route::middleware(['api', 'dhru.auth', 'throttle:60,1'])
->post('/dhru', DhruController::class)
->name('dhru.api');
