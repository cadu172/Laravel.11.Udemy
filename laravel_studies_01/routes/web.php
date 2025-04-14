<?php

use App\Http\Controllers\admin\AdminController;
use Illuminate\Support\Facades\Route as FacadesRoute;

Route::get("/admin", [AdminController::class, "index"])->name("admin");
