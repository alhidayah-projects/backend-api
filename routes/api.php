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
    Route::put('/user/{id}', [\App\Http\Controllers\Api\AuthController::class, 'updateProfile']);
    /**delete user*/
    Route::delete('/user/{id}', [\App\Http\Controllers\Api\AuthController::class, 'destroy']);
});
/**login*/
Route::post('/login', [\App\Http\Controllers\Api\AuthController::class, 'login']);
/**get all user*/
Route::get('/user', [\App\Http\Controllers\Api\AuthController::class, 'getAllUser']);
 /**get by Id User */
 Route::get('/user/{id}', [\App\Http\Controllers\Api\AuthController::class, 'GetUserById']);
/**forgot password*/
Route::post('/forgot-password', [\App\Http\Controllers\Api\NewPasswordController::class, 'forgotPassword']);
/**reset password*/
Route::post('/reset-password', [\App\Http\Controllers\Api\NewPasswordController::class, 'reset']);
/**********************************   Enpoint Auth Route Ends Here   *******************************************/


/**********************************   Enpoint Contact Route Starts Here   *******************************************/
Route::post('/contact', [\App\Http\Controllers\Api\ContactController::class, 'store']);
//Route::get('/contact', [\App\Http\Controllers\Api\ContactController::class, 'getContactData']);
Route::get('/contact', [\App\Http\Controllers\Api\ContactController::class, 'filterContact']);
Route::get('/contact/{id}', [\App\Http\Controllers\Api\ContactController::class, 'getContactDataById']);
Route::middleware('auth:sanctum')->group(function () {
    /**Delete contact by id*/
    Route::delete('/contact/{id}', [\App\Http\Controllers\Api\ContactController::class, 'deleteContactDataById']);
    /**Delete all contact*/
    Route::delete('/contact', [\App\Http\Controllers\Api\ContactController::class, 'deleteAllContactData']);
    /**update is_read */
    Route::put('/contact/{id}', [\App\Http\Controllers\Api\ContactController::class, 'updateIsRead']);
});
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
Route::get('/rekening', [\App\Http\Controllers\Api\RekeningController::class, 'filterRekening']);
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
    /**only admin delete all donate*/
    Route::delete('/donate', [\App\Http\Controllers\Api\DonateController::class, 'deleteAllDonate']);
});
/**Get all donate*/
Route::get('/donate', [\App\Http\Controllers\Api\DonateController::class, 'filterDonate']);
/**Get donate by id*/
Route::get('/donate/{id}', [\App\Http\Controllers\Api\DonateController::class, 'getDonateById']);
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


/**********************************   Enpoint Gallery Route Starts Here   *******************************************/
Route::middleware('auth:sanctum')->group(function() {
/**Create Gallery*/
Route::post('/gallery', [\App\Http\Controllers\Api\GalleryController::class, 'createGallery']);
/**Delete Gallery By Id */
Route::delete('/gallery/{id}', [\App\Http\Controllers\Api\GalleryController::class, 'deleteGalleryById']);
/**Delete All Gallery*/
Route::delete('/gallery', [\App\Http\Controllers\Api\GalleryController::class, 'deleteAllGallery']);
/**Update Gallery*/
Route::put('/gallery/{id}', [\App\Http\Controllers\Api\GalleryController::class, 'updateGallery']);
});
/**Get All Gallery*/
Route::get('/gallery', [\App\Http\Controllers\Api\GalleryController::class, 'getAllGallery']);
/**Get Gallery By Id*/
Route::get('/gallery/{id}', [\App\Http\Controllers\Api\GalleryController::class, 'getGalleryById']);

/**********************************   Enpoint Gallery Route Ends Here   *******************************************/

/**********************************   Enpoint Anak Route Starts Here   *******************************************/
Route::middleware('auth:sanctum')->group(function() {
/**Create Anak*/
Route::post('/anak', [\App\Http\Controllers\Api\AnakController::class, 'create']);
/**Update Anak*/
Route::put('/anak/{id}', [\App\Http\Controllers\Api\AnakController::class, 'updateAnak']);
/**Delete Anak By Id*/
Route::delete('/anak/{id}', [\App\Http\Controllers\Api\AnakController::class, 'deleteAnakById']);
/**Delete All Anak*/
Route::delete('/anak', [\App\Http\Controllers\Api\AnakController::class, 'deleteAllAnak']);

});

/**Get All Anak*/
//Route::get('/anak', [\App\Http\Controllers\Api\AnakController::class, 'getAllAnak']);
/**Get Anak By Id*/
Route::get('/anak/{id}', [\App\Http\Controllers\Api\AnakController::class, 'getAnakById']);
/**Filter Anak by name*/
Route::get('/anak', [\App\Http\Controllers\Api\AnakController::class, 'filterAnak']);
/**********************************   Enpoint Anak Route Ends Here   *******************************************/

/**********************************   Enpoint Yayasan Route Starts Here   *******************************************/
Route::middleware('auth:sanctum')->group(function() {
/**Create Yayasan*/
Route::post('/yayasan', [\App\Http\Controllers\Api\YayasanController::class, 'create']);
Route::put('yayasan/{id}', [\App\Http\Controllers\Api\YayasanController::class, 'updateYayasan']);
Route::delete('yayasan/{id}', [\App\Http\Controllers\Api\YayasanController::class, 'deleteYayasan']);
});

/**Get Yayasan */
Route::get('yayasan', [\App\Http\Controllers\Api\YayasanController::class, 'getYayasan']);
/**********************************   Enpoint Yayasan Route Ends Here   *******************************************/


/**********************************   Enpoint landing page Route Starts Here   *******************************************/
/**Get Article and Gallery*/
Route::get('/landing', [\App\Http\Controllers\Api\LandingController::class, 'index']);
/**Get No Telepon */
Route::get('/landing/telepon', [\App\Http\Controllers\Api\LandingController::class, 'getNoTelp']);
/**Get Profile Yayasan */
Route::get('/landing/profile', [\App\Http\Controllers\Api\LandingController::class, 'getAbout']);
/**Get visi misi */
Route::get('/landing/visi-misi', [\App\Http\Controllers\Api\LandingController::class, 'getVisiMisi']);
/**Search Donate by donasi_id*/
Route::get('/landing/donate/{id}', [\App\Http\Controllers\Api\LandingController::class, 'getDonate']);
/**Get Contact */
Route::get('/landing/contact', [\App\Http\Controllers\Api\LandingController::class, 'getContact']);
/**Get Article by title */
Route::get('/landing/article', [\App\Http\Controllers\Api\LandingController::class, 'searchArticle']);
/**Get Gallery by title */
Route::get('/landing/gallery', [\App\Http\Controllers\Api\LandingController::class, 'searchGallery']);
/**********************************   Enpoint landing page Ends Here   *******************************************/

/**********************************   Enpoint landing page Route Starts Here   *******************************************/
Route::middleware('auth:sanctum')->group(function(){
    /**Create Pengurus */
    Route::post('/pengurus', [\App\Http\Controllers\Api\PengurusController::class, 'createdPengurus']);
    /**Update Pengurus */
    Route::put('/pengurus/{id}', [\App\Http\Controllers\Api\PengurusController::class, 'updatePengurus']);
    /**Delete Pengurus by Id */
    Route::delete('/pengurus/{id}', [\App\Http\Controllers\Api\PengurusController::class, 'deletePengurusbyId']);
    /**Delete All Pengurus */
    Route::delete('/pengurus', [\App\Http\Controllers\Api\PengurusController::class, 'deleteAllPengurus']);
});
/**Filter pengurus */
Route::get('/pengurus', [\App\Http\Controllers\Api\PengurusController::class, 'filterPengurus']);
/**Get Pengurus by Id */
Route::get('/pengurus/{id}', [\App\Http\Controllers\Api\PengurusController::class, 'getPengurusbyId']);
/**********************************   Enpoint Pengurus page Ends Here   *******************************************/

/**********************************   Enpoint Dasboard Route Starts Here   *******************************************/
Route::get('/dashboard', [\App\Http\Controllers\Api\DashboardController::class, 'countData']);
/**********************************   Enpoint Dashboard page Ends Here   *******************************************/