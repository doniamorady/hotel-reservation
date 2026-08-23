<?php

use App\Http\Controllers\Api\BedController;
use App\Http\Controllers\SettingController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::prefix('beds')->group(function(){
    Route::get('/',[BedController::class, 'index']);
    Route::post('/',[BedController::class, 'store']);
    Route::get('/{bed}', [BedController::class , 'show']);
    Route::put('/{bed}', [BedController::class , 'update']);
    Route::delete('/{bed}',[BedController::class, 'destroy']);
});

Route::prefix('settings')->group(function(){
   Route::get('/',[SettingController::class, 'index']); 
   Route::put('/',[SettingController::class, 'update']); 
});
