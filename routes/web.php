<?php

use App\Http\Controllers\PostController; 
use App\Http\Controllers\BannerController; 
use App\Http\Controllers\BodyContentController;
use App\Http\Controllers\GalleryController;
use Illuminate\Support\Facades\Route;

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

Route::middleware(['auth'])->group(function () {
Route::get('/', [PostController::class, 'home']); 
Route::get('/admin', [PostController::class, 'index']); 
Route::get('/posts/create', [PostController::class, 'create']); 
Route::post('/posts', [PostController::class, 'store']); 
Route::get('/posts/{post}/edit', [PostController::class, 'edit']); 
Route::put('/posts/{post}', [PostController::class, 'update']); 
Route::delete('/posts/{post}', [PostController::class, 'destroy']); 
});
Auth::routes();

Route::get('/banner', [BannerController::class, 'index']); 
Route::get('/banner/create', [BannerController::class, 'create']); 
Route::post('/banner', [BannerController::class, 'store']); 
Route::get('/banner/{id}/edit', [BannerController::class, 'edit']); 
Route::put('/banner/{id}', [BannerController::class, 'update']); 
Route::delete('/banner/{id}', [BannerController::class, 'destroy']);

Route::get('/bodycontent', [bodycontentController::class, 'index']); 
Route::get('/bodycontent/create', [bodycontentController::class, 'create']); 
Route::post('/bodycontent', [bodycontentController::class, 'store']); 
Route::get('/bodycontent/{id}/edit', [bodycontentController::class, 'edit']); 
Route::put('/bodycontent/{id}', [bodycontentController::class, 'update']); 
Route::delete('/bodycontent/{id}', [bodycontentController::class, 'destroy']);

Route::get('/Gallery', [GalleryController::class, 'index']); 
Route::get('/Gallery/create', [GalleryController::class, 'create']); 
Route::post('/Gallery', [GalleryController::class, 'store']);

