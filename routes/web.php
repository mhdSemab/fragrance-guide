<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FragranceController;

// Redirect the home page to the fragrance index page
Route::get('/', function () {
    return redirect()->route('fragrances.index');
});

// Define resource routes for the fragrances
Route::resource('fragrances', FragranceController::class);
