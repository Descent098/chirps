<?php

use App\Http\Controllers\ChirpController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::resource('chirps', ChirpController::class) // Create route(s) at /chirps
    ->only([      // Creates 4 routes;
        "index",  // chirps.index is a GET        at /chirps
        "store",  // chirps.store is POST         at /chirps
        'edit',   // chirps.edit is a GET         at /chirps/{chirp}/edit
        'update', // chirps.update is a PUT/PATCH at /chirps/{chirp}
        'destroy' // chirsp.destroy is a DELETE   at /chirps/{chirp}
        ]) 
    -> middleware(["auth", "verified"]);

require __DIR__.'/auth.php';
