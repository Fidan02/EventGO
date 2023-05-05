<?php

use App\Actions\Fortify\UpdateUserPassword;
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
    Route::resource('/home', EventController::class)->parameters([
        'home' => 'event_id'
    ]);
    Route::get('home/{event_id}/like', [EventController::class, 'likeSystem'])->name('home.likeSystem');
    Route::get('home/{event_id}/save', [EventController::class, 'saveSystem'])->name('home.saveSystem');
    Route::get('home/{event_id}/attend', [EventController::class, 'attendSystem'])->name('home.attendSystem');
    Route::post('home/{event_id}/comment', [EventController::class, 'commentEvent'])->name('home.commentEvent');
    Route::get('home/{event_id}/comment-delete', [EventController::class, 'removeComment'])->name('home.removeComment');
    // Galllery Forum Route
    Route::resource('/gallery-forum', GalleryController::class)->parameters([
        'gallery-forum' => 'gallery_id'
    ]);
    // Attending Events Route
    Route::get('/attending-events', [AttendController::class, 'index'])->name('attending-events');

    // Messages route
    Route::get('/chat', [MessageController::class, 'index'])->name('chat');

    // Freinds route
    Route::get('/friends', [FriendController::class, 'index'])->name('friends');
    Route::get('/friends/{id}/accept', [FriendController::class, 'accept'])->name('accept');
    Route::get('/friends/{id}/unfriend', [FriendController::class, 'unfriend'])->name('remove');
    Route::get('/friends/{id}/addfriend', [FriendController::class, 'addFriend'])->name('addfriend');
    // Saved Events route
    Route::get('/saved-events', [SavedEventsController::class, 'index'])->name('saved-events');
    
    // Settings route
    Route::get('/settings', [SettingsController::class, 'index'])->name('settings');

    Route::get('/profile', [ProfileController::class, 'index'])->name('profile');
    Route::get('/profile/edit-profile', [ProfileController::class, 'editProfile'])->name('profile-edit');
    Route::put('/profile/update', [ProfileController::class, 'update'])->name('update');
    Route::put('/profile/password-update', [ProfileController::class, 'passwordUpdate'])->name('password-update');
});
