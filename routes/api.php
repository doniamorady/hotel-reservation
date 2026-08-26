<?php

use App\Http\Controllers\Api\BedController;
use App\Http\Controllers\Api\BookingController;
use App\Http\Controllers\Api\RoomController;
use App\Http\Controllers\Api\SettingController;
use App\Http\Controllers\Api\UserController;
use Illuminate\Support\Facades\Route;


Route::prefix('admin')->group(function () {

    Route::prefix('beds')->group(function () {
        Route::get('/', [BedController::class, 'index']);
        Route::post('/', [BedController::class, 'store']);
        Route::get('/{bed}', [BedController::class, 'show']);
        Route::put('/{bed}', [BedController::class, 'update']);
        Route::delete('/{bed}', [BedController::class, 'destroy']);
    });

    Route::prefix('settings')->group(function () {
        Route::get('/', [SettingController::class, 'index']);
        Route::put('/', [SettingController::class, 'update']);
    });

    Route::prefix('rooms')->group(function () {
        Route::get('/', [RoomController::class, 'index']);
        Route::post('/', [RoomController::class, 'store']);
        Route::get('/{room}', [RoomController::class, 'show']);
        Route::put('/{room}', [RoomController::class, 'update']);
        Route::delete('/{room}', [RoomController::class, 'destroy']);
    });

    Route::prefix('users')->group(function () {
        Route::get('/', [UserController::class, 'index']);
        Route::post('/', [UserController::class, 'store']);
        Route::get('/{user}', [UserController::class, 'show']);
        Route::put('/{user}', [UserController::class, 'update']);
        Route::delete('/{user}', [UserController::class, 'destroy']);
    });
    Route::prefix('bookings')->group(function () {
        Route::get('/', [BookingController::class, 'index']);
        Route::post('/room/{room}', [BookingController::class, 'store']);
        Route::get('/{booking}', [BookingController::class, 'show']);
        Route::put('/{booking}/extra', [BookingController::class, 'addExtra']);
        Route::put('/{booking}/status', [BookingController::class, 'updateStatus']);
    });
});


Route::prefix('booking')->group(function () {
    Route::post('/room/{room}', [BookingController::class, 'store']);
    Route::get('/{booking}', [BookingController::class, 'show']);
    Route::put('/{booking}/add-breakfast', [BookingController::class, 'addBreakfast']);
});
