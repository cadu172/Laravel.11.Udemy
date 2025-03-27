<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\MainController;
use Illuminate\Support\Facades\Route;

Route::GET("/login",[AuthController::class,"login"]);
Route::POST("/loginSubmit",[AuthController::class,"loginSubmit"]);
Route::GET("/logout",[AuthController::class,"logout"]);
