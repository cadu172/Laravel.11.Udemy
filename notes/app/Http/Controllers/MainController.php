<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MainController extends Controller
{
    public function index()
    {
        return "main.index";
    }

    public function newNote()
    {
        return "Main controller.newNote";
    }

}
