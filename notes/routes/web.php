<?php

use App\Http\Controllers\MainController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    //return view('welcome');
    echo "Hello World";
});

Route::get('/about', function() {
    return "About Us";
});


Route::get('/main', [MainController::class, 'index']);
