<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// When user first enters the site
Route::get('/', function () {
    return view('welcome');
});

// Galllery Forum Route
Route::get('/gallery-forum', function () {
    return view('galleryPages.index');
})->name('gallery-forum');

// Attending Events Route
Route::get('/attending-events', function () {
    return view('attendingEvents');
})->name('attending-events');


// Homepage route (Dashboard is the home page main)
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('EventPages.dashboard');
    })->name('dashboard');
});
