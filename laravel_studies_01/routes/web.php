<?php

use App\Http\Controllers\MainController;
use Illuminate\Support\Facades\Route as FacadesRoute;

Route::get("/", [MainController::class, "index"])->name("index");
Route::get("/about", [MainController::class, "about"])->name("about");
Route::get("/contact", [MainController::class, "contact"])->name("contact");
