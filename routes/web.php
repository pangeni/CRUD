<?php

use App\Http\Controllers\PostController; 
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

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/admin',function () {
    return view('admin.dashboard'); 
}); 
Route::get('/', [PostController::class, 'home']); 
Route::get('/admin', [PostController::class, 'index']); 
Route::get('/posts/create', [PostController::class, 'create']); 
Route::post('/posts', [PostController::class, 'store']); 
Route::get('/posts/{post}/edit', [PostController::class, 'edit']); 
Route::put('/posts/{post}', [PostController::class, 'update']); 
Route::delete('/posts/{post}', [PostController::class, 'destroy']); 

Auth::routes();


