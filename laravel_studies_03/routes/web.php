<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return "Blade Layouts";
});

Route::view('/home', 'home')->name('home');
