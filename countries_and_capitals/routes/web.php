<?php

use App\Http\Controllers\MainController;
use Illuminate\Support\Facades\Route;

Route::view('/', 'home');
Route::get('/app_data', [MainController::class, 'showData']);
