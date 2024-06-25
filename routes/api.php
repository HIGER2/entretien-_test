<?php

use App\Http\Controllers\Api\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;



Route::prefix('user')->group(function () {
    Route::controller(UserController::class)->group(function () {
        Route::post('create', 'create');
        Route::get('read-all', 'readAll');
        Route::get('read/{id}/{uid}', 'read');
        Route::post('update/{id}/{uid}', 'update');
        Route::get('delete/{id}/{uid}', 'delete');
    });
});
