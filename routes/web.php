<?php

  use App\Http\Controllers\AmenityController;
  use App\Http\Controllers\RolesController;
  use App\Http\Controllers\HomeController;
  use App\Http\Controllers\ReservationController;
  use App\Http\Controllers\DashboardController;
  use Illuminate\Support\Facades\Route;

//Route::get('/', function () {
//    return view('welcome');
//});

  Route::get('/', HomeController::class)->name('home');
//Route::get('/amenities', function () {
//    return view('amenities.index');
//})->name('amenities.index');

  Route::resource('amenities', AmenityController::class)->middleware(['auth', 'verified']);
  Route::resource('reservations', ReservationController::class)->middleware(['auth', 'verified']);
  Route::resource('roles', RolesController::class)->middleware(['auth', 'verified']);

  Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
  ])->group(function () {
      Route::get('/dashboard', [DashboardController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');
  });


