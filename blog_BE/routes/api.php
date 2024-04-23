<?php

use App\Http\Controllers\v1\auth\AuthController;

use App\Http\Controllers\v1\blog\BlogController;
use App\Http\Controllers\v1\blog\UserBlogController;
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

Route::group(['prefix' => 'auth'], function () {
    Route::post('login', [AuthController::class, 'login']);
    Route::post('register', [AuthController::class, 'register']);

    Route::group(['middleware' => 'auth:sanctum'], function () {
        Route::get('logout', [AuthController::class, 'logout']);
        Route::get('user', [AuthController::class, 'user']);
    });
});



Route::group(['prefix' => 'admin', 'middleware' => ['auth:sanctum', 'admin']], function () {
    Route::resource('blog', BlogController::class);
    Route::post('loginAdmin', [AuthController::class, 'admin']);
});

Route::get('/blogUser', [UserBlogController::class, 'index']);
Route::get('/blogUser/{id}', [UserBlogController::class, 'blogPost']);
