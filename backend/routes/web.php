<?php

use App\Http\Controllers\Admin\BedController;
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
});
