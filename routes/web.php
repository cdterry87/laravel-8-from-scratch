<?php

use App\Http\Controllers\AdminPostController;
use App\Http\Controllers\NewsletterController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SessionsController;
use App\Http\Controllers\PostCommentsController;

Route::get('/', [PostController::class, 'index'])->name('home');
Route::get('post/{post:slug}', [PostController::class, 'show'])->name('post');
Route::post('post/{post:slug}/comments', [PostCommentsController::class, 'store']);

Route::post('newsletter', NewsletterController::class);

Route::get('register', [RegisterController::class, 'create'])->middleware('guest');
Route::post('register', [RegisterController::class, 'store'])->middleware('guest');

Route::get('login', [SessionsController::class, 'create'])->middleware('guest');
Route::post('login', [SessionsController::class, 'store'])->middleware('guest');
Route::post('logout', [SessionsController::class, 'destroy'])->middleware('auth');

Route::middleware('can:admin')->group(function() {
  // Route::get('admin/posts', [AdminPostController::class, 'index']);
  // Route::get('admin/posts/create', [AdminPostController::class, 'create'])->middleware('can:admin');
  // Route::post('admin/posts', [AdminPostController::class, 'store']);
  // Route::get('admin/posts/{post}/edit', [AdminPostController::class, 'edit']);
  // Route::patch('admin/posts/{post}', [AdminPostController::class, 'update'])->middleware('can:admin');
  // Route::delete('admin/posts/{post}', [AdminPostController::class, 'destroy']);

  // Instead of having individual routes, you can use a Route::resource call instead.  We don't have a "show" route, so we can remove it with except()
  Route::resource('admin/posts', AdminPostController::class)->except('show');
});