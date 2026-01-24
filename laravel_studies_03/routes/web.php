<?php

use App\Http\Controllers\MainController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return "Blade Layouts";
});

Route::GET('/home', [MainController::class,'showPage'])->name('home');
