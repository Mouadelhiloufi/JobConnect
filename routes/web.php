<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/login',function(){
    return view('login');
});

Route::get('/recruteur',function(){
    return view('recruteur.recruteur');
})->name('recruteur');

Route::get('/chercheur',function(){
    return view('chercheur.chercheur');
})->name('chercheur');

Route::get('/search', [ProfileController::class, 'index'])->name('search_page');

Route::get('/profile/{user}', [ProfileController::class, 'show'])->name('profile.show');



Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
