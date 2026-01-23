<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return "Blade Layouts";
});

Route::view('/home', 'home', ["myName" => "cadu172@gmail.com"])->name('home');
