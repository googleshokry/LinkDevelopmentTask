<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\EmailController;
use App\Http\Controllers\HealthCheckController;
use App\Http\Controllers\ProductController;
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
Route::group([
    'middleware' => 'auth'
], function () {

    // Auth Routes
    Route::group(['prefix' => 'auth'], function () {
        Route::post('login', [AuthController::class, 'login'])->withoutMiddleware('auth');
        Route::post('logout', [AuthController::class, 'logout']);
        Route::post('refresh', [AuthController::class, 'refresh']);
        Route::post('me', [AuthController::class, 'me']);
    });

    // Product Routes todo
    Route::group(['prefix' => 'product'], function () {
        Route::get('/', [ProductController::class, 'index']);
        Route::post('store', [ProductController::class, 'store']);
        Route::patch('update', [ProductController::class, 'update']);
        Route::delete('delete', [ProductController::class, 'delete']);
    });
    // Email Service Route todo
    Route::group(['prefix' => 'email'], function () {
        Route::post('send', [EmailController::class, 'send']);
    });

    // ShopCart service todo
    Route::group(['prefix' => 'cart'], function () {
        Route::post('add', [CartController::class, 'addItem']);
        Route::delete('delete', [CartController::class, 'deleteItem']);
        Route::post('check-out', [CartController::class, 'checkOut']);
    });

    // Healthy Endpoint todo
    Route::get('health', HealthCheckController::class);


    //

});
