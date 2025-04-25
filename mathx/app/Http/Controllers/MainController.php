<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MainController extends Controller
{
    public function home() {
        return "Home route";
    }

    public function generateExercises(Request $request) {
        return "Generate exercises route";
    }

    public function printExercises() {
        return "Print exercises route";
    }

    public function exportExercises() {
        return "Export exercises route";
    }

}
