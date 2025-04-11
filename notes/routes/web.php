<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\MainController;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\CheckIsLogged;
use App\Http\Middleware\CheckIsNotLogged;

/**
 * Rotas de usuários não autenticados
 */
Route::middleware(CheckIsNotLogged::class)->group(function() {
    Route::GET("/login",[AuthController::class,"login"])->name("login");
    Route::POST("/loginSubmit",[AuthController::class,"loginSubmit"]);
});

/**
 * Rotas de usuários autenticados
 */
Route::middleware(CheckIsLogged::class)->group(function () {
    Route::GET("/logout",[AuthController::class,"logout"])->name("logout");
    Route::GET("/newNote",[MainController::class,"newNote"])->name("newNote");
    Route::POST("/newNoteSubmit",[MainController::class,"newNoteSubmit"])->name("newNoteSubmit");
    Route::POST("/editNoteSubmit",[MainController::class,"editNoteSubmit"])->name("editNoteSubmit");
    Route::GET("/editNote/{id}",[MainController::class,"editNote"])->name("editNote");
    Route::GET("/deleteNote/{id}",[MainController::class,"deleteNote"])->name("deleteNote");
    Route::GET("/deleteNoteConfirm/{id}",[MainController::class,"deleteNoteConfirm"])->name("deleteNoteConfirm");
    Route::GET("/",[MainController::class,"index"])->name("home");
});
