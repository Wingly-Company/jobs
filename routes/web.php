<?php

use App\Http\Controllers\AircraftController;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', fn () => Inertia::render('Welcome'));

Route::get('/aircraft', AircraftController::class);
