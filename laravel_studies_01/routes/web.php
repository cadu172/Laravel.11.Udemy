<?php

use App\Http\Controllers\ClientsController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\SingleActionController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get("/init",[MainController::class,"initMethod"])->name("init");
Route::get("/view",[MainController::class,"viewPage"])->name("view");

// rota para single action controller
Route::get("/singleAtionController",SingleActionController::class)->name("single");

// rota para controller com construtor
//Route::resource("users",UserController::class);

Route::resources([
    "products" => ProductsController::class,
    "users" => UserController::class,
    "clients" => ClientsController::class
]);
