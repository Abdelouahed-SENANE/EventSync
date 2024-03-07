<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\SocialiteController;
use \App\Http\Controllers\OrganizerController;
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
// ---  Pages Routes ---
Route::group([] , function () {
    Route::get('/' , [PagesController::class , 'home']);
    Route::get('explore-events' , [PagesController::class , 'exploreEvents'])->name('pages.explore-events');
    Route::get('event/{id}' , [PagesController::class , 'event'])->name('pages.event.jpg');

});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::patch('/profile-picture', [ProfileController::class, 'picture'])->name('profile.update.picture');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// ==== Organizer Routes ====
Route::group([] , function() {
    Route::get('/organizer' ,  [OrganizerController::class , 'dashboard'])->name('organizer');
});
// ==== Socialite Route ====
Route::group([] , function () {
    Route::get('auth/google' , [SocialiteController::class , 'redirectToGoogle'])->name('google');
    Route::get('auth/google/callback' , [SocialiteController::class , 'handleGoogleCallback']);
});


require __DIR__.'/auth.php';
