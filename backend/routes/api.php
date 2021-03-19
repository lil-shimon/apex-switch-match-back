<?php

use Illuminate\Support\Facades\Route;

Route::group(['middleware' => ['api']],
    function () {
        Route::apiResource('user', 'App\Http\Controllers\UserController');
    });
