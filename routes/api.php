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

// Admin only register admin or pengurus
Route::middleware('auth:sanctum')->group(function () {
    Route::post('/register', [\App\Http\Controllers\Api\AuthController::class, 'register']);
});

// login
Route::post('/login', [\App\Http\Controllers\Api\AuthController::class, 'login']);

// get user (by token)
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// logout
Route::middleware('auth:sanctum')->group(function () {
    Route::post('/logout', [\App\Http\Controllers\Api\AuthController::class, 'logout']);
});

//update user
Route::middleware('auth:sanctum')->group(function () {
    Route::put('/user', [\App\Http\Controllers\Api\AuthController::class, 'update']);
});

//forgot password
Route::post('/forgot-password', [\App\Http\Controllers\Api\NewPasswordController::class, 'forgotPassword']);

//reset password
Route::post('/reset-password', [\App\Http\Controllers\Api\NewPasswordController::class, 'reset']);

//contact
Route::post('/contact', [\App\Http\Controllers\Api\ContactController::class, 'store']);
Route::get('/contact', [\App\Http\Controllers\Api\ContactController::class, 'getContactData']);
Route::get('/contact/{id}', [\App\Http\Controllers\Api\ContactController::class, 'getContactDataById']);
Route::delete('/contact/{id}', [\App\Http\Controllers\Api\ContactController::class, 'deleteContactDataById']);
Route::delete('/contact', [\App\Http\Controllers\Api\ContactController::class, 'deleteAllContactData']);

