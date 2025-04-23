<?php

use App\Http\Controllers\MainController;
use Illuminate\Support\Facades\Route;


Route::get("/",[MainController::class,"showView"])->name("home");

Route::post("/submitForm",[MainController::class,"submitForm"])->name("submit");
