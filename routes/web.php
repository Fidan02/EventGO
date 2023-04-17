<?php

use App\Http\Controllers\AttendController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\FriendController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SavedEventsController;
use App\Http\Controllers\SettingsController;
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




Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    
    // Homepage route (Dashboard is the home page main)
    Route::resource('/home', EventController::class);
    // Galllery Forum Route
    Route::resource('/gallery-forum', GalleryController::class);

    // Attending Events Route
    Route::get('/attending-events/{id}', [AttendController::class, 'index'])->name('attending-events');

    // Messages route
    Route::get('/chat', [MessageController::class, 'index'])->name('chat');

    // Freinds route
    Route::get('/friends', [FriendController::class, 'index'])->name('friends');

    // Saved Events route
    Route::get('/saved-events', [SavedEventsController::class, 'index'])->name('saved-events');
    
    // Settings route
    Route::get('/settings', [SettingsController::class, 'index'])->name('settings');

    Route::get('/profile', [ProfileController::class, 'index'])->name('profile');
    Route::get('/profile/edit-profile', [ProfileController::class, 'editProfile'])->name('profile-edit');
    Route::put('/profile/update', [ProfileController::class, 'update'])->name('update');
});
