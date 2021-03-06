<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::prefix('order')->group(function () {
    Route::post('', [\App\Http\Controllers\OrderController::class, 'store']);
    Route::get('/{id}', [\App\Http\Controllers\OrderController::class, 'index']);
    Route::put('/{id}', [\App\Http\Controllers\OrderController::class, 'update']);
    Route::delete('/{id}', [\App\Http\Controllers\OrderController::class, 'destroy']);
});
