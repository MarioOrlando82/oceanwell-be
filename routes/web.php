<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DonationController;
use App\Http\Controllers\VolunteerController;


use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('Home');
})->name('home');

Route::get('/aboutUs', function () {
    return view('AboutUs');
});

Route::get('/article/{id}', [ArticleController::class, 'content'])->name('article.content');
Route::get('/article', [ArticleController::class, 'index'])->name('article.index');

Route::middleware('is_admin')->group(function () {
    Route::get('/create-donation', [DonationController::class, 'create_donation'])->name('create_donation');
    Route::post('/store-donation', [DonationController::class, 'store_donation'])->name('store_donation');
    Route::get('/edit-donation/{id}', [DonationController::class, 'edit_donation'])->name('edit_donation');
    Route::patch('/update-donation/{id}', [DonationController::class, 'update_donation'])->name('update_donation');
    Route::delete('/delete-donation/{id}', [DonationController::class, 'delete_donation'])->name('delete_donation');

    Route::get('/create-volunteer', [VolunteerController::class, 'create_volunteer'])->name('create_volunteer');
    Route::post('/store-volunteer', [VolunteerController::class, 'store_volunteer'])->name('store_volunteer');
    Route::get('/edit-volunteer/{id}', [VolunteerController::class, 'edit_volunteer'])->name('edit_volunteer');
    Route::patch('/update-volunteer/{id}', [VolunteerController::class, 'update_volunteer'])->name('update_volunteer');
    Route::delete('/delete-volunteer/{id}', [VolunteerController::class, 'delete_volunteer'])->name('delete_volunteer');

    Route::get('/list-article', [ArticleController::class, 'list'])->name('article.list');
    Route::get('/create-article', [ArticleController::class, 'create'])->name('article.create');
    Route::post('/store-article', [ArticleController::class, 'store'])->name('article.store');
    Route::get('/edit-article/{id}', [ArticleController::class, 'edit'])->name('article.edit');
    Route::patch('/update-article/{id}', [ArticleController::class, 'update'])->name('article.update');
    Route::delete('/delete-article/{id}', [ArticleController::class, 'delete'])->name('article.delete');
});

Route::get('/donation', [DonationController::class, 'index_donation'])->name('index_donation');
Route::get('/detail-donation/{id}', [DonationController::class, 'detail_donation'])->name('detail_donation');
Route::patch('/update-total-donation/{id}', [DonationController::class, 'update_total_donation'])->name('update_total_donation');

Route::get('/volunteer', [VolunteerController::class, 'index_volunteer'])->name('index_volunteer');
Route::get('/detail-volunteer/{id}', [VolunteerController::class, 'detail_volunteer'])->name('detail_volunteer');
Route::patch('/update-total-volunteer/{id}', [VolunteerController::class, 'update_total_volunteer'])->name('update_total_volunteer');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});



require __DIR__ . '/auth.php';
