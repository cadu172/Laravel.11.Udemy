<?php

use App\Http\Controllers\MainController;
use Illuminate\Support\Facades\Route;


Route::get("/",[MainController::class,"showView"])->name("home");

Route::post("/submitForm",[MainController::class,"submitForm"])->name("submit");


Route::get("/setSession",[MainController::class,"setSession"])->name("setSession");
Route::get("/clearSession",[MainController::class,"clearSession"])->name("clearSession");
