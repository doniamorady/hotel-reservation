<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\BedController;
use App\Http\Controllers\Api\BookingController;
use App\Http\Controllers\Api\ProfileController;
use App\Http\Controllers\Api\RoomController;
use App\Http\Controllers\Api\SettingController;
use App\Http\Controllers\Api\UserController;
use Illuminate\Support\Facades\Route;


Route::prefix('auth')->group(function () {

    Route::post('/send-otp', [AuthController::class, 'sendOtp']);
    Route::post('/verify-otp', [AuthController::class, 'verifyOtp']);
});


Route::middleware(['auth:sanctum'])->group(function () {

    Route::post('/auth/logout', [AuthController::class, 'logout']);
    Route::get('/me', [AuthController::class, 'me']);

    Route::prefix('profile')->group(function () {
        Route::get('/', [ProfileController::class, 'showProfile']);
        Route::put('/', [ProfileController::class, 'updateProfile']);
    });

    Route::prefix('comments')->group(function () {
        Route::get('/', [CommentController::class, 'index']);
    });

    Route::prefix('bookings')->group(function () {
        Route::get('/', [BookingController::class, 'index']);
        Route::post('/room/{room}', [BookingController::class, 'store']);
        Route::get('/{booking}', [BookingController::class, 'show']);
        Route::put('/{booking}/add-breakfast', [BookingController::class, 'addBreakfast']);
    });

    Route::middleware(['role:admin'])->prefix('admin')->group(function () {

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
            Route::post('/', [RoomController::class, 'store']);
            Route::put('/{room}', [RoomController::class, 'update']);
            Route::delete('/{room}', [RoomController::class, 'destroy']);
        });

        Route::prefix('users')->group(function () {
            Route::get('/', [UserController::class, 'index']);
            Route::post('/', [UserController::class, 'createAdmin']);
            Route::get('/{user}', [UserController::class, 'show']);
            Route::put('/{user}', [UserController::class, 'update']);
            Route::put('/{user}/change-role', [UserController::class, 'changeRole']);
        });

        Route::prefix('bookings')->group(function () {
            Route::put('/{booking}/change-status', [BookingController::class, 'updateStatus']);
        });
    });
});


Route::prefix('rooms')->group(function () {
    Route::get('/', [RoomController::class, 'index']);
    Route::get('/{room}', [RoomController::class, 'show']);
    Route::post('/{room}/comment', [RoomController::class, 'commentStore']);
});

Route::get('beds', [BedController::class, 'index']);
