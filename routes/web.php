<?php

use App\Http\Controllers\PostController; 
use App\Http\Controllers\BannerController; 
use App\Http\Controllers\BodyContentController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\ServicesController;
use App\Http\Controllers\CustomerDetailsController;
use App\Http\Controllers\RoomDetailsController;
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
Route::get('/banner/{banner}/edit', [BannerController::class, 'edit']); 
Route::put('/banner/{banner}', [BannerController::class, 'update']); 
Route::get('/banner/{banner}', [BannerController::class, 'destroy']);

Route::get('/bodycontent', [bodycontentController::class, 'index']); 
Route::get('/bodycontent/create', [bodycontentController::class, 'create']); 
Route::post('/bodycontent', [bodycontentController::class, 'store']); 
Route::get('/bodycontent/{id}/edit', [bodycontentController::class, 'edit']); 
Route::put('/bodycontent/{id}', [bodycontentController::class, 'update']); 
Route::delete('/bodycontent/{id}', [bodycontentController::class, 'destroy']);

Route::get('/Gallery', [GalleryController::class, 'index'])->name('gallery.index'); 
Route::get('/Gallery/create', [GalleryController::class, 'create']); 
Route::post('/Gallery', [GalleryController::class, 'store']);
Route::get('/Gallery/{gallery}/edit', [GalleryController::class, 'edit']);
Route::put('/Gallery/{gallery}', [GalleryController::class, 'update'])->name('gallery.index');
Route::get('/Gallery/{gallery}', [GalleryController::class, 'destroy']);

Route::get('/Comment', [CommentController::class, 'index'])->name('comment.index'); 
Route::get('/Comment/create', [CommentController::class, 'create']); 
Route::post('/Comment', [CommentController::class, 'store']);
Route::get('/Comment/{comment}/edit', [CommentController::class, 'edit']);
Route::post('/Comment/{comment}', [CommentController::class, 'update']);
Route::get('/Comment/{comment}', [CommentController::class, 'destroy']);

Route::get('/Member', [MemberController::class, 'index'])->name('member.index'); 
Route::get('/member/create', [MemberController::class, 'create']); 
Route::post('/member', [MemberController::class, 'store'])->name('Member.index');
Route::get('/member/{id}/edit', [MemberController::class, 'edit']);
Route::post('/member/{id}', [MemberController::class, 'update']);
Route::delete('/member/{id}', [MemberController::class, 'destroy']);

Route::get('/service', [servicesController::class, 'index'])->name('service.index'); 
Route::get('/service/create', [servicesController::class, 'create']); 
Route::post('/service', [servicesController::class, 'store']);
Route::get('/service/{service}/edit', [servicesController::class, 'edit']);
Route::put('/service/{service}', [servicesController::class, 'update']);
Route::get('/service/{service}', [servicesController::class, 'destroy']);

Route::get('/content', [BodyContentController::class, 'index'])->name('content.index'); 
Route::get('/content/create', [BodyContentController::class, 'create']); 
Route::post('/content', [BodyContentController::class, 'store']);
Route::get('/content/{content}/edit', [BodyContentController::class, 'edit']);
Route::put('/content/{content}', [BodyContentController::class, 'update']);
Route::get('/content/{content}', [BodyContentController::class, 'destroy']);

Route::get('/Customer', [CustomerDetailsController::class, 'index'])->name('Customer.index'); 
Route::get('/Customer/create', [CustomerDetailsController::class, 'create']); 
Route::post('/Customer', [CustomerDetailsController::class, 'store']);
Route::get('/Customer/{id}/edit', [CustomerDetailsController::class, 'edit']);
Route::put('/Customer/{id}', [CustomerDetailsController::class, 'update'])->name('Customer.index');
Route::get('/Customer/{id}', [CustomerDetailsController::class, 'destroy']);


Route::get('/Booking', [RoomDetailsController::class, 'index']); 
Route::get('/Booking/create', [RoomDetailsController::class, 'create']); 
Route::post('/Booking', [RoomDetailsController::class, 'store']);
// Route::get('/Booking/{id}/edit', [RoomDetailsController::class, 'edit']);
// Route::put('/Booking/{id}', [RoomDetailsController::class, 'update']);
// Route::get('/Booking/{id}', [RoomDetailsController::class, 'destroy']);
