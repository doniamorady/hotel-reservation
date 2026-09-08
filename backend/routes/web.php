<?php

use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\BedController;
use App\Http\Controllers\Admin\BookingController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\Admin\RoomController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\UserController;
use Illuminate\Support\Facades\Route;




Route::prefix('login')->group(function () {
    Route::get('/', [AuthController::class, 'loginForm'])->name('admin.auth.login-form');
    Route::post('/', [AuthController::class, 'login'])->name('admin.auth.login');
});



Route::middleware(['auth','role:admin'])->prefix('admin')->group(function () {

    Route::get('/', [DashboardController::class, 'index'])->name('admin.dashboard');
    
    Route::get('/profile', [ProfileController::class, 'index'])->name('admin.user.profile.index');
    Route::put('/profile', [ProfileController::class, 'update'])->name('admin.user.profile.update');

    Route::post('/logout', [AuthController::class, 'logout'])->name('admin.logout');

    //bed
    Route::prefix('beds')->group(function () {
        Route::get('/', [BedController::class, 'index'])->name('admin.bed.index');
        Route::get('/create', [BedController::class, 'create'])->name('admin.bed.create');
        Route::post('/', [BedController::class, 'store'])->name('admin.bed.store');
        Route::get('/edit/{bed}', [BedController::class, 'edit'])->name('admin.bed.edit');
        Route::put('/{bed}', [BedController::class, 'update'])->name('admin.bed.update');
        Route::delete('/{bed}', [BedController::class, 'destroy'])->name('admin.bed.delete');
    });

    //room
    Route::prefix('rooms')->group(function () {
        Route::get('/', [RoomController::class, 'index'])->name('admin.room.index');
        Route::get('/create', [RoomController::class, 'create'])->name('admin.room.create');
        Route::post('/', [RoomController::class, 'store'])->name('admin.room.store');
        Route::get('/edit/{room}', [RoomController::class, 'edit'])->name('admin.room.edit');
        Route::put('/{room}', [RoomController::class, 'update'])->name('admin.room.update');
        Route::delete('/delete/{room}', [RoomController::class, 'destroy'])->name('admin.room.delete');
    });

    // users
    Route::prefix('users')->group(function () {
        Route::get('/', [UserController::class, 'index'])->name('admin.user.index');
        Route::get('/create', [UserController::class, 'create'])->name('admin.user.create');
        Route::post('/', [UserController::class, 'adminStore'])->name('admin.user.store');
        Route::get('/edit/{user}', [UserController::class, 'edit'])->name('admin.user.edit');
        Route::put('/{user}', [UserController::class, 'update'])->name('admin.user.update');
        Route::delete('/{user}', [UserController::class, 'destroy'])->name('admin.user.delete');
    });

    Route::prefix('bookings')->name('admin.bookings.')->group(function () {
        Route::get('/', [BookingController::class, 'index'])->name('index');
        Route::get('/create', [BookingController::class, 'create'])->name('create');
        Route::post('/room/{room}', [BookingController::class, 'store'])->name('store');
        Route::get('/{booking}', [BookingController::class, 'show'])->name('show');
        Route::get('/{booking}/edit', [BookingController::class, 'edit'])->name('edit');
        Route::put('/{booking}', [BookingController::class, 'update'])->name('update');
        Route::put('/{booking}/update-status', [BookingController::class, 'updateStatus'])->name('update-status');
        Route::put('/{booking}/add-breakfast', [BookingController::class, 'addBreakfast'])->name('add-breakfast');
    });


    //settings
    Route::prefix('settings')->group(function () {
        Route::get('/', [SettingController::class, 'index'])->name('admin.setting.index');
        Route::put('/', [SettingController::class, 'update'])->name('admin.setting.update');
    });
});
