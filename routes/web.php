<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FragranceController;


Route::get('fragrances/about', [FragranceController::class, 'about'])->name('fragrances.about');
Route::resource('fragrances', FragranceController::class);
