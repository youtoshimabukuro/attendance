<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AtteController;

Route::get('/email/verify', function () {
    return view('auth.verify-email');
})->middleware('auth')->name('verification.notice');

Route::middleware('auth')->group(function () {
    Route::get('/', [AtteController::class, 'stamp']);
    Route::post('/timeIn', [AtteController::class, 'timeIn']);
    Route::post('/timeOut', [AtteController::class, 'timeOut']);
    Route::post('/breakIn', [AtteController::class, 'breakIn']);
    Route::post('/breakOut', [AtteController::class, 'breakOut']);
    Route::post('/user_attendance', [AtteController::class, 'user_attendance']);
    Route::get('/userList', [AtteController::class, 'userList']);
    Route::get('/attendance', [AtteController::class, 'attendance']);
    Route::get('/yesterday', [AtteController::class, 'yesterday']);
    Route::get('/tomorrow', [AtteController::class, 'tomorrow']);
    //Route::post('/time',[AtteController::class,'attendance']);
});
