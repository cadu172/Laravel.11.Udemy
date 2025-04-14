<?php

use App\Http\Controllers\admin\AdminController;
use Illuminate\Support\Facades\Route as FacadesRoute;

Route::get("/admin/{value}", [AdminController::class, "teste"])->name("admin");
