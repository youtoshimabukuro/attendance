<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AtteController;

Route::middleware('auth')->group(function () {
    Route::get('/', [AtteController::class, 'stamp']);
    Route::post('/timeIn', [AtteController::class, 'timeIn']);
    Route::post('/timeOut', [AtteController::class, 'timeOut']);
    Route::post('/breakIn', [AtteController::class, 'breakIn']);
    Route::post('/breakOut', [AtteController::class, 'breakOut']);
    Route::get('/attendance', [AtteController::class, 'attendance']);
    //Route::post('/time',[AtteController::class,'attendance']);
});