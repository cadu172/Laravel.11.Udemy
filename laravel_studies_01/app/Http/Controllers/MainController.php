<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MainController extends Controller
{
    public function index(): void {
        echo "<p>MainController index</p>";
    }

    public function about (): void {
        echo "<p>MainController about</p>";
    }

    public function contact(): void {
        echo "<p>MainController contact</p>";
    }


}
