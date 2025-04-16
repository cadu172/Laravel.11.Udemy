<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MainController extends Controller
{
    public function index(): void {
        echo "MainController index";
    }

    public function about (): void {
        echo "MainController about";
    }

    public function contact(): void {
        echo "MainController contact";
    }


}
