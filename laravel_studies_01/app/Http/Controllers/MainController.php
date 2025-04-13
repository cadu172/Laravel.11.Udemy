<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MainController extends Controller
{
    public function index()
    {
        return 'MainController.index';
    }

    public function about()
    {
        return 'MainController.about';
    }
}
