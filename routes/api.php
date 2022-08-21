<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\AllCrud\CrudController;
use App\Http\Controllers\Blogger\BloggerController;

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


Route::post('/loginAttempt',[LoginController::class,'loginAttempt'])->name('loginAttempt');

// admins routes
Route::group(['prefix' => 'admin','middleware' => 'auth:api-admins'], function() {

    Route::post('/createUser',[CrudController::class,'createUser']);
    Route::post('/editUser',[CrudController::class,'editUser']);
    Route::post('/deleteUser',[CrudController::class,'deleteUser']);
    
});

// Bloggers Route
Route::group(['prefix' => 'blogger','middleware' => 'auth:api-bloggers'], function() {

    Route::post('/createBlog',[BloggerController::class,'createBlog']);


});
