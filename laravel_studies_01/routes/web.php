<?php

use App\Http\Controllers\MainController;
use App\Http\Middleware\EndMiddleware;
use App\Http\Middleware\StartMiddleware;
use Illuminate\Support\Facades\Route as FacadesRoute;

//Route::get("/", [MainController::class, "index"])->name("index");
//Route::get("/about", [MainController::class, "about"])->name("about");
//Route::get("/contact", [MainController::class, "contact"])->name("contact");


//Route::get("/", [MainController::class, "index"])->name("index")->middleware([StartMiddleware::class]);
//Route::get("/about", [MainController::class, "about"])->name("about")->middleware([StartMiddleware::class,EndMiddleware::class]);
//Route::get("/contact", [MainController::class, "contact"])->name("contact");

Route::middleware([StartMiddleware::class,EndMiddleware::class])->group(function(){
    Route::get("/", [MainController::class, "index"])->name("index");
    Route::get("/about", [MainController::class, "about"])->name("about")->withOutMiddleware([EndMiddleware::class]);
    Route::get("/contact", [MainController::class, "contact"])->name("contact");
});
