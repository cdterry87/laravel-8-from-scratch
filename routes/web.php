<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SessionsController;
use App\Http\Controllers\PostCommentsController;

Route::post('newsletter', function () {
  request()->validate(['email' => 'required|email']);
  
  $mailchimp = new MailchimpMarketing\ApiClient();

  $mailchimp->setConfig([
    'apiKey' => config('services.mailchimp.key'),
    'server' => 'us5'
  ]);

  // $response = $mailchimp->ping->get();
  // $response = $mailchimp->lists->getAllLists();
  try {
    $response = $mailchimp->lists->addListMember('3b616432f2', [
      'email_address' => request('email'),
      'status' => 'subscribed'
    ]);
  } catch (\Exception $e) {
    throw \Illuminate\Validation\ValidationException::withMessages([
      'email' => 'This email could not be added to our newsletter list.'
    ]);
  }

  // ddd($response);
  return redirect('/')->with('success', 'You are now signed up for our newsletter!');
});

Route::get('/', [PostController::class, 'index'])->name('home');
Route::get('post/{post:slug}', [PostController::class, 'show'])->name('post');
Route::post('post/{post:slug}/comments', [PostCommentsController::class, 'store']);

Route::get('register', [RegisterController::class, 'create'])->middleware('guest');
Route::post('register', [RegisterController::class, 'store'])->middleware('guest');

Route::get('login', [SessionsController::class, 'create'])->middleware('guest');
Route::post('login', [SessionsController::class, 'store'])->middleware('guest');
Route::post('logout', [SessionsController::class, 'destroy'])->middleware('auth');