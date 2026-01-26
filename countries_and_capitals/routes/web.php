<?php

use App\Http\Controllers\MainController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return "Hello World! Projeto Countries and Capitals";
});


Route::get('/app_data', [MainController::class, 'showData']);
