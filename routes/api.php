<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\bannerAPI;
use App\Http\Controllers\AuthAPIController;
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


// Public routes
Route::get('banner', [bannerAPI::class, 'index']);
Route::get('banner/search/{name}', [bannerAPI::class, 'search']);
// registration for user api 
Route::post('/register', [AuthAPIController::class, 'register']);
Route::post('/login', [AuthAPIController::class, 'login']);
Route::post('/logout', [AuthAPIController::class, 'logout']);


//Protected Routes
Route::group(['middleware' =>['auth:sanctum']], function () {
    Route::post('banner', [bannerAPI::class, 'store']);
    Route::put('banner/{id}', [bannerAPI::class, 'update']);
    Route::delete('banner', [bannerAPI::class, 'destroy']); 

});


// Route::resource('banner', 'bannerAPI');

