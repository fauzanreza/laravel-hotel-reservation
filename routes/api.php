<?php

use App\Http\Controllers\UserAuthenticationController;
use App\Http\Controllers\HotelsController;
use App\Http\Controllers\RoomsController;
use App\Http\Controllers\ReservationsController;
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

######################### Public Route #########################

Route::prefix('v1')->group(function () {
    Route::post('login', [UserAuthenticationController::class, 'login']);
    Route::post('register', [UserAuthenticationController::class, 'register']);
});

Route::prefix('v1')->group(function () {
    Route::apiResource('hotels', HotelsController::class);
    Route::apiResource('rooms', RoomsController::class);
});

######################### Private Route #########################
Route::prefix('v1')->middleware('auth:sanctum')->group(function () {
    Route::post('logout', [UserAuthenticationController::class, 'logout']);
    Route::apiResource('reservations', ReservationsController::class);
});