<?php

use App\Http\Controllers\Admin\BedController;
use App\Http\Controllers\Admin\RoomController;
use App\Http\Controllers\Admin\SettingController;
use Illuminate\Support\Facades\Route;

Route::prefix('admin')->group(function () {

    Route::post('/logout')->name('admin.logout');

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
        Route::put('/status/{room}', [RoomController::class, 'changeStatus'])->name('admin.room.change-status');
        Route::delete('/delete/{room}', [RoomController::class, 'destroy'])->name('admin.room.delete');
    });


    //settings
    Route::prefix('settings')->group(function () {
        Route::get('/', [SettingController::class, 'index'])->name('admin.setting.index');
        Route::put('/', [SettingController::class, 'update'])->name('admin.setting.update');
    });
});
