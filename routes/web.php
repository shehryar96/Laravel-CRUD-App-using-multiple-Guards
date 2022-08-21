<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\User\UserController;
use App\Http\Controllers\Blogger\BloggerController;




/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


Route::get('/login',[LoginController::class,'login'])->name('login');
Route::post('/loginAttempt',[LoginController::class,'loginAttempt'])->name('loginAttempt');
Route::post('/logout',[LoginController::class,'logout'])->name('logout');

Route::group(['prefix' => 'admin','middleware' => 'auth:web-admins'], function() {
    Route::get('/dashboard', [AdminController::class,'dashboard'])->name('admin.dashboard');
});

Route::group(['prefix' => 'user','middleware' => 'auth'], function() {
    Route::get('/dashboard', [UserController::class,'dashboard'])->name('user.dashboard');
});

Route::group(['prefix' => 'blogger','middleware' => 'auth:web-bloggers'], function() {
    Route::get('/dashboard', [BloggerController::class,'dashboard'])->name('blogger.dashboard');
});
