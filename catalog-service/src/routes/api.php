<?php

use App\Http\Controllers\ProductsController;
use Illuminate\Http\Request;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group([], function () {
    Route::get('health', \Spatie\Health\Http\Controllers\SimpleHealthCheckController::class);

    // Product Routes todo
    Route::group(['prefix' => 'product'], function () {
        Route::get('/', [ProductsController::class, 'index']);
        Route::post('/store', [ProductsController::class, 'store']);
        Route::patch('{product}/update', [ProductsController::class, 'update']);
        Route::delete('{product}/delete', [ProductsController::class, 'destroy']);
    });
});
