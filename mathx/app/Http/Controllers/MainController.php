<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;

class MainController extends Controller
{
    public function home(): View {
        return view("home");
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
