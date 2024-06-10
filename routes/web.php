<?php

  use App\Http\Controllers\AmenityController;
  use App\Http\Controllers\HomeController;
  use Illuminate\Support\Facades\Route;

//Route::get('/', function () {
//    return view('welcome');
//});

  Route::get('/', HomeController::class)->name('home');

//Route::get('/amenities', function () {
//    return view('amenities.index');
//})->name('amenities.index');

  Route::resource('amenities', AmenityController::class)->middleware(['auth', 'verified']);

  Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
  ])->group(function () {
    Route::get('/dashboard', function () {
      return view('dashboard');
    })->middleware(['auth', 'verified'])->name('dashboard');
  });
