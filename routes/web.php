<?php

use App\Http\Controllers\CandidateProfileController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Job_offerController;

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

Route::get('/jobOffer' ,function(){
    return view('job_offers.job_offers');
})->name('jobOffer');

Route::get('/jobOffer',[Job_offerController::class,'index'])->name('job_offer.index');

Route::get('/createOffer',function(){
    return view('job_offers.create');
})->name('job_offers.create');

Route::post('/job-offers', [Job_offerController::class, 'store'])->name('job_offers.store');

Route::post('/job-offers/{job_offer}/fermer', [Job_offerController::class, 'fermerOffre'])->name('job_offers.fermer');

Route::get('/offers/{job_offer}',[Job_offerController::class,'show_detail'])->name('job_offers.show');





Route::middleware('auth')->group(function () {
    Route::get('/profile/{user}', [ProfileController::class, 'show'])->name('profile.show');
Route::get('/search', [ProfileController::class, 'index'])->name('search_page');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/myOffers',[Job_offerController::class,'myOffers'])->name('job_offers.my_offers');
    Route::get('/chercheur', [Job_offerController::class, 'show_offers'])->name('chercheur.index');
});

require __DIR__.'/auth.php';
