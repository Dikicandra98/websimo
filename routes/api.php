<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::prefix('admin')->group(function () {

    Route::post('/login', [App\Http\Controllers\Api\Admin\LoginController::class, 'index'])->name('admin.login');

    Route::group(['middleware' => 'auth:api_admin'], function () {
        Route::get('/user', [App\Http\Controllers\Api\Admin\LoginController::class, 'getUser'])->name('admin.user');
        Route::get('/refresh', [App\Http\Controllers\Api\Admin\LoginController::class, 'refreshToken'])->name('admin.refresh');
        Route::post('/logout', [App\Http\Controllers\Api\Admin\LoginController::class, 'logout'])->name('admin.logout');

        Route::apiResource('/mahasiswa', App\Http\Controllers\Api\Admin\MahasiswaController::class,
        ['except' => ['create', 'edit'], 'as' => 'admin']);
    });

});
