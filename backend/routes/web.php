<?php

use App\Http\Controllers\Admin\BedController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Admin\RoomController;
use App\Http\Controllers\Admin\BookingController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\SettingController;


Route::prefix('admin')
    // ->middleware(['auth', 'role:admin'])
    ->group(function () {


        // Route::get('/', function () {
        //     return view('admin.dashboard');
        // })->name('admin.dashboard');



    
        Route::post('/logout')->name('admin.logout');


        //dashboard
        Route::get('/dashboard', function(){
            // dd(Auth::user()->getRoleNames());
        })->name('admin.dashboard');


        //room
        Route::prefix('room')->group(function () {
            Route::get('/', [RoomController::class, 'index'])->name('admin.room.index');
            Route::get('/create', [RoomController::class, 'create'])->name('admin.room.create');
            Route::post('/', [RoomController::class, 'store'])->name('admin.room.store');
            Route::get('/edit/{room}', [RoomController::class, 'edit'])->name('admin.room.edit');
            Route::put('/{room}', [RoomController::class, 'update'])->name('admin.room.update');
            Route::delete('/delete/{room}', [RoomController::class, 'destroy'])->name('admin.room.delete');
        });


        //bed
        Route::prefix('beds')->group(function () {
            Route::get('/', [BedController::class, 'index'])->name('admin.bed.index');
            Route::get('/create', [BedController::class, 'create'])->name('admin.bed.create');
            Route::post('/', [BedController::class, 'store'])->name('admin.bed.store');
            Route::get('/edit/{bed}', [BedController::class, 'edit'])->name('admin.bed.edit');
            Route::put('/{bed}', [BedController::class, 'update'])->name('admin.bed.update');
            Route::delete('/{bed}', [BedController::class, 'destroy'])->name('admin.bed.delete');
        });


        //amenities
        Route::prefix('amenity')->group(function () {
            Route::get('/', [AmenityController::class, 'index'])->name('admin.amenity.index');
            Route::get('/create', [AmenityController::class, 'create'])->name('admin.amenity.create');
            Route::post('/', [AmenityController::class, 'store'])->name('admin.amenity.store');
            Route::get('/edit/{amenity}', [AmenityController::class, 'edit'])->name('admin.amenity.edit');
            Route::put('/{amenity}', [AmenityController::class, 'update'])->name('admin.amenity.update');
            Route::delete('/{amenity}', [AmenityController::class, 'destroy'])->name('admin.amenity.delete');
        });

        //comment 
        Route::prefix('comment')->group(function () {
            Route::get('/', [CommentController::class, 'index'])->name('admin.comment.index');
        });


        //user
        Route::group(['middleware' => ['role:super_admin']], function () {
            Route::prefix('user')->group(function () {
                Route::get('/', [UserController::class, 'index'])->name('admin.user.index');
                Route::get('/create', [UserController::class, 'create'])->name('admin.user.create');
                Route::post('/', [UserController::class, 'store'])->name('admin.user.store');
                Route::get('/edit/{user}', [UserController::class, 'edit'])->name('admin.user.edit');
                Route::put('/{user}', [UserController::class, 'update'])->name('admin.user.update');
                Route::get('/profile', [UserController::class, 'showProfile'])->name('admin.user.show-profile');
                Route::put('/profile/{user}', [UserController::class, 'profileUpdate'])->name('admin.user.profile-update');
            });
        });


        // Route::prefix('bookings')->group(function () {


        //     Route::get('/', [BookingController::class, 'index'])
        //         ->name('admin.bookings.index');


        //     Route::get('/{booking}', [BookingController::class, 'show'])
        //         ->name('admin.bookings.show');


        //     Route::put(
        //         '/{booking}/change-status',
        //         [BookingController::class, 'updateStatus']
        //     )
        //         ->name('admin.bookings.change-status');
        // });






        // 


        // Route::prefix('users')->group(function () {


        //     Route::get('/', [UserController::class, 'index'])
        //         ->name('admin.users.index');


        //     Route::get('/create', [UserController::class, 'create'])
        //         ->name('admin.users.create');


        //     Route::post('/', [UserController::class, 'store'])
        //         ->name('admin.users.store');


        //     Route::get('/{user}', [UserController::class, 'show'])
        //         ->name('admin.users.show');


        //     Route::put('/{user}', [UserController::class, 'update'])
        //         ->name('admin.users.update');


        //     Route::put(
        //         '/{user}/change-role',
        //         [UserController::class, 'changeRole']
        //     )
        //         ->name('admin.users.change-role');
        // });




        // Route::prefix('settings')->group(function () {


        //     Route::get('/', [SettingController::class, 'index'])
        //         ->name('admin.settings.index');


        //     Route::put('/', [SettingController::class, 'update'])
        //         ->name('admin.settings.update');
        // });
    });
