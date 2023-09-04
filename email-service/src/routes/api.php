<?php

use App\Http\Controllers\EmailController;
use App\Http\Controllers\HealthCheckController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::group([], function () {
    Route::get('health', HealthCheckController::class);

    // Email Routes todo
    Route::group(['prefix' => 'email'], function () {
        Route::post('/send', [EmailController::class, 'send']);
    });
});
