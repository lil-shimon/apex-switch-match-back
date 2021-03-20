<?php

use Illuminate\Support\Facades\Route;

Route::group(['middleware' => ['api']],
    function () {
        Route::apiResource('user', 'App\Http\Controllers\UserController');
        Route::apiResource('post', 'App\Http\Controllers\PostController');
    });
