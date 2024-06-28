<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AtteController;

Route::middleware('auth')->group(function () {
    Route::get('/', [AtteController::class, 'stamp']);
    Route::post('/timeIn', [AtteController::class, 'timeIn']);
    Route::post('/timeOut', [AtteController::class, 'timeOut']);
    Route::post('/breakIn', [AtteController::class, 'breakIn']);
    Route::post('/breakOut', [AtteController::class, 'breakOut']);
    Route::get('/userAttendance', [AtteController::class, 'userAttendance']);
    Route::get('/userList', [AtteController::class, 'userList']);
    Route::get('/attendance', [AtteController::class, 'attendance']);
    //Route::post('/time',[AtteController::class,'attendance']);
});

Route::get('/email/verify', function () {
    return view('auth.verify-email');
})->middleware('auth')->name('verification.notice');