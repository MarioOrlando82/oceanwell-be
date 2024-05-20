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
    Route::get('/create-donation', [DonationController::class, 'create'])->name('create');
    Route::post('/store-donation', [DonationController::class, 'store'])->name('store');
    Route::get('/edit-donation/{id}', [DonationController::class, 'edit'])->name('edit');
    Route::patch('/update-donation/{id}', [DonationController::class, 'update'])->name('update');
    Route::delete('/delete-donation/{id}', [DonationController::class, 'delete'])->name('delete');

    Route::get('/create-volunteer', [VolunteerController::class, 'create'])->name('create');
    Route::post('/store-volunteer', [VolunteerController::class, 'store'])->name('store');
    Route::get('/edit-volunteer/{id}', [VolunteerController::class, 'edit'])->name('edit');
    Route::patch('/update-volunteer/{id}', [VolunteerController::class, 'update'])->name('update');
    Route::delete('/delete-volunteer/{id}', [VolunteerController::class, 'delete'])->name('delete');

    Route::get('/list-article', [ArticleController::class, 'list'])->name('article.list');
    Route::get('/create-article', [ArticleController::class, 'create'])->name('article.create');
    Route::post('/store-article', [ArticleController::class, 'store'])->name('article.store');
    Route::get('/edit-article/{id}', [ArticleController::class, 'edit'])->name('article.edit');
    Route::patch('/update-article/{id}', [ArticleController::class, 'update'])->name('article.update');
    Route::delete('/delete-article/{id}', [ArticleController::class, 'delete'])->name('article.delete');
});

Route::get('/donation', [DonationController::class, 'index'])->name('index');
Route::get('/detail-donation/{id}', [DonationController::class, 'detail'])->name('detail');
Route::patch('/update-total/{id}', [DonationController::class, 'update_total'])->name('update_total');

Route::get('/volunteer', [VolunteerController::class, 'index'])->name('index');
Route::get('/detail-volunteer/{id}', [VolunteerController::class, 'detail'])->name('detail');
Route::patch('/update-total/{id}', [VolunteerController::class, 'update_total'])->name('update_total');
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});



require __DIR__ . '/auth.php';
