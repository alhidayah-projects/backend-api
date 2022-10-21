<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Database\Eloquent\Collection;

// ENDPOINT AUTH
// Admin only register admin or pengurus
Route::middleware('auth:sanctum')->group(function () {
    Route::post('/register', [\App\Http\Controllers\Api\AuthController::class, 'register']);
});
// login
Route::post('/login', [\App\Http\Controllers\Api\AuthController::class, 'login']);
// logout
Route::middleware('auth:sanctum')->group(function () {
    Route::post('/logout', [\App\Http\Controllers\Api\AuthController::class, 'logout']);
});
//update user
Route::middleware('auth:sanctum')->group(function () {
    Route::put('/user', [\App\Http\Controllers\Api\AuthController::class, 'update']);
});
// get all user
Route::get('/user', [\App\Http\Controllers\Api\AuthController::class, 'getAllUser']);
// delete user
Route::middleware('auth:sanctum')->group(function () {
    Route::delete('/user/{id}', [\App\Http\Controllers\Api\AuthController::class, 'destroy']);
});
//forgot password
Route::post('/forgot-password', [\App\Http\Controllers\Api\NewPasswordController::class, 'forgotPassword']);
//reset password
Route::post('/reset-password', [\App\Http\Controllers\Api\NewPasswordController::class, 'reset']);


// ENDPOINT CONTACT
Route::post('/contact', [\App\Http\Controllers\Api\ContactController::class, 'store']);
Route::get('/contact', [\App\Http\Controllers\Api\ContactController::class, 'getContactData']);
Route::get('/contact/{id}', [\App\Http\Controllers\Api\ContactController::class, 'getContactDataById']);
Route::delete('/contact/{id}', [\App\Http\Controllers\Api\ContactController::class, 'deleteContactDataById']);
Route::delete('/contact', [\App\Http\Controllers\Api\ContactController::class, 'deleteAllContactData']);

// ENDPOINT REKENING
// Create new rekening
Route::middleware('auth:sanctum')->group(function () {
    Route::post('/rekening', [\App\Http\Controllers\Api\RekeningController::class, 'store']);
});
// Get all rekening
Route::get('/rekening', [\App\Http\Controllers\Api\RekeningController::class, 'getRekeningData']);
// Get rekening by id
Route::get('/rekening/{id}', [\App\Http\Controllers\Api\RekeningController::class, 'show']);
// Update rekening by id
Route::middleware('auth:sanctum')->group(function () {
    Route::put('/rekening/{id}', [\App\Http\Controllers\Api\RekeningController::class, 'update']);
});
// Delete rekening by id
Route::middleware('auth:sanctum')->group(function () {
    Route::delete('/rekening/{id}', [\App\Http\Controllers\Api\RekeningController::class, 'destroy']);
});
// delete all rekening
Route::middleware('auth:sanctum')->group(function () {
    Route::delete('/rekening', [\App\Http\Controllers\Api\RekeningController::class, 'destroyAll']);
});