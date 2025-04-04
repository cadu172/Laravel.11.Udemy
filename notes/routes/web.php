<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\MainController;
use Illuminate\Support\Facades\Route;
use \App\Http\Middleware\CheckIsLogged;

Route::GET("/login",[AuthController::class,"login"])->name("login");
Route::POST("/loginSubmit",[AuthController::class,"loginSubmit"]);


Route::middleware(CheckIsLogged::class)->group(function () {
    Route::GET("/logout",[AuthController::class,"logout"])->name("logout");    
    Route::GET("/newNote",[MainController::class,"newNote"])->name("main.newNote"); 
    Route::GET("/",[MainController::class,"index"])->name("main.index"); 
});
