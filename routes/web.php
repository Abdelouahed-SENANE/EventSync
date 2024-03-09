<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\SocialiteController;
use \App\Http\Controllers\OrganizerController;
use \App\Http\Controllers\EventController;
use \App\Http\Controllers\AdminController;
use \App\Http\Controllers\CategoryController;


//|--------------------------------------------------------------------------
//| Web Routes
//|--------------------------------------------------------------------------
//|
//| Here is where you can register web routes for your application. These
//| routes are loaded by the RouteServiceProvider and all of them will
//| be assigned to the "web" middleware group. Make something great!
//|
//*/
// ---  Pages Routes ---
Route::group([] , function () {
    Route::get('/' , [PagesController::class , 'home']);
    Route::get('explore-events' , [PagesController::class , 'exploreEvents'])->name('pages.explore-events');
    Route::get('event/{id}' , [PagesController::class , 'event'])->name('pages.event.jpg');

});
// Route Profile
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::patch('/profile-picture', [ProfileController::class, 'picture'])->name('profile.update.picture');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
// ==== Admin Routes ====
Route::group([] , function() {
    Route::get('/admin-panel' ,  [AdminController::class , 'dashboard']);
    Route::get('/admin-events' ,  [AdminController::class , 'events'])->name('admin.events');
    Route::get('/admin-users' ,  [AdminController::class , 'users'])->name('admin.users');
    Route::get('/admin-categories' ,  [CategoryController::class , 'categories'])->name('admin.categories');
    Route::delete('/delete-category/{category}' ,  [CategoryController::class , 'delete'])->name('admin.category.delete');
    Route::post('/update-category/' ,  [CategoryController::class , 'update'])->name('update.category');
    Route::post('/create-category/' ,  [CategoryController::class , 'store'])->name('create.category');
    Route::delete('/delete-user/{user}' ,  [AdminController::class , 'softDelete'])->name('admin.users.delete');
    Route::post('/accept-events' ,  [EventController::class , 'accepted'])->name('accepted.event');
    Route::post('/refuse-events' ,  [EventController::class , 'refused'])->name('refused.event');
    Route::post('/create-event' ,  [AdminController::class , 'store'])->name('create.event');

});

// ==== Organizer Routes ====
Route::group([] , function() {
    Route::get('/organizer' ,  [OrganizerController::class , 'dashboard'])->name('organizer');
    Route::get('/create-event' ,  [EventController::class , 'create'])->name('create.event');
    Route::post('/create-event' ,  [EventController::class , 'store'])->name('create.event');
    Route::delete('/delete-event' ,  [EventController::class , 'delete'])->name('delete.event');

});
// ==== Socialite Route ====
Route::group([] , function () {
    Route::get('auth/google' , [SocialiteController::class , 'redirectToGoogle'])->name('google');
    Route::get('auth/google/callback' , [SocialiteController::class , 'handleGoogleCallback']);
});


require __DIR__.'/auth.php';
