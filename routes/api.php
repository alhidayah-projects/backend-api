<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Database\Eloquent\Collection;

/**********************************   Enpoint Auth Route Starts Here   *******************************************/
/**Admin only register admin or pengurus */
Route::middleware('auth:sanctum')->group(function () {
    /**Admin only register admin or pengurus */
    Route::post('/register', [\App\Http\Controllers\Api\AuthController::class, 'register']);
    /**logout*/
    Route::post('/logout', [\App\Http\Controllers\Api\AuthController::class, 'logout']);
    /**update user*/
    Route::put('/user', [\App\Http\Controllers\Api\AuthController::class, 'update']);
    /**delete user*/
    Route::delete('/user/{id}', [\App\Http\Controllers\Api\AuthController::class, 'destroy']);
});
/**login*/
Route::post('/login', [\App\Http\Controllers\Api\AuthController::class, 'login']);
/**get all user*/
Route::get('/user', [\App\Http\Controllers\Api\AuthController::class, 'getAllUser']);
/**forgot password*/
Route::post('/forgot-password', [\App\Http\Controllers\Api\NewPasswordController::class, 'forgotPassword']);
/**reset password*/
Route::post('/reset-password', [\App\Http\Controllers\Api\NewPasswordController::class, 'reset']);
/**********************************   Enpoint Auth Route Ends Here   *******************************************/


/**********************************   Enpoint Contact Route Starts Here   *******************************************/
Route::post('/contact', [\App\Http\Controllers\Api\ContactController::class, 'store']);
Route::get('/contact', [\App\Http\Controllers\Api\ContactController::class, 'getContactData']);
Route::get('/contact/{id}', [\App\Http\Controllers\Api\ContactController::class, 'getContactDataById']);
Route::delete('/contact/{id}', [\App\Http\Controllers\Api\ContactController::class, 'deleteContactDataById']);
Route::delete('/contact', [\App\Http\Controllers\Api\ContactController::class, 'deleteAllContactData']);
/**********************************   Enpoint Contact Route Ends Here   *******************************************/


/**********************************   Enpoint Rekening Route Starts Here   *******************************************/
Route::middleware('auth:sanctum')->group(function () {
    /**Create new rekening*/
    Route::post('/rekening', [\App\Http\Controllers\Api\RekeningController::class, 'store']);
    /**Update rekening by id*/
    Route::put('/rekening/{id}', [\App\Http\Controllers\Api\RekeningController::class, 'update']);
    /**Delete rekening by id*/
    Route::delete('/rekening/{id}', [\App\Http\Controllers\Api\RekeningController::class, 'destroy']);
    /**Delete all rekening*/
    Route::delete('/rekening', [\App\Http\Controllers\Api\RekeningController::class, 'destroyAll']);
});
/**Get all rekening*/
Route::get('/rekening', [\App\Http\Controllers\Api\RekeningController::class, 'getRekeningData']);
/**Get rekening by id*/
Route::get('/rekening/{id}', [\App\Http\Controllers\Api\RekeningController::class, 'show']);
/**********************************   Enpoint Rekening Route Ends Here   *******************************************/


/**********************************   Enpoint Donates Route Starts Here   *******************************************/
/**Create new donate*/
Route::post('/donate', [\App\Http\Controllers\Api\DonateController::class, 'createDonate']);
Route::middleware('auth:sanctum')->group(function () {
    /**approve or rejected donate admin only*/
    Route::put('/donate/{id}', [\App\Http\Controllers\Api\DonateController::class, 'updateStatusDonate']);
    /**only admin delete donate*/
    Route::delete('/donate/{id}', [\App\Http\Controllers\Api\DonateController::class, 'deleteDonate']);
});
/**Get all donate*/
Route::get('/donate', [\App\Http\Controllers\Api\DonateController::class, 'getAllDonate']);
/**Get donate by id*/
Route::get('/donate/{id}', [\App\Http\Controllers\Api\DonateController::class, 'getDonateById']);
/**show image bukti_pembayaran*/
Route::get('/donate/bukti_pembayaran/{filename}', [\App\Http\Controllers\Api\DonateController::class, 'showImage']);
/**********************************   Enpoint Donates Route Ends Here   *******************************************/


/**********************************   Enpoint Articles Route Starts Here   *******************************************/
/**Create Article*/
Route::middleware('auth:sanctum')->group(function() {
/**Create Article*/
Route::post('/article', [\App\Http\Controllers\Api\ArticleController::class, 'createArticle']);
/**Update Articles*/
Route::put('/article/{id}', [\App\Http\Controllers\Api\ArticleController::class, 'updateArticle']);
/**Delete Article By Id*/
Route::delete('/article/{id}', [\App\Http\Controllers\Api\ArticleController::class, 'deleteArticle']);
/**Delete all Article*/
Route::delete('/article', [\App\Http\Controllers\Api\ArticleController::class, 'deleteAllArticle']);
});
/**Get All Article*/
Route::get('/article', [\App\Http\Controllers\Api\ArticleController::class, 'getAllArticle']);
/**Get Article By Id*/
Route::get('/article/{id}', [\App\Http\Controllers\Api\ArticleController::class, 'getArticleById']);
/**********************************   Enpoint Articles Route Ends Here   *******************************************/
