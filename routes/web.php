<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DonationController;

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('Home');
});

Route::middleware('is_admin')->group(function(){
    Route::get('/create-donation', [DonationController::class, 'create'])->name('create');
    Route::post('/store-donation', [DonationController::class, 'store'])->name('store');
    Route::get('/edit-donation/{id}', [DonationController::class, 'edit'])->name('edit');
    Route::patch('/update-donation/{id}', [DonationController::class, 'update'])->name('update');
    Route::delete('/delete-donation/{id}', [DonationController::class, 'delete'])->name('delete');
});
Route::get('/donation', [DonationController::class, 'index'])->name('index');
Route::get('/detail-donation/{id}', [DonationController::class, 'detail'])->name('detail');
Route::patch('/update-total/{id}', [DonationController::class, 'update_total'])->name('update_total');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
