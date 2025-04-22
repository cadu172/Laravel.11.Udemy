<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;

class MainController extends Controller
{
    public function showView(): View
    {
        return view('home',
            [
                "value" => 20,
                "cities" => ["Cotia","Osasco","Carapicuíba","Ubatuba","Buenos Aires"],
                "names" => ["João","Pedro","Luiz","Souza"],
                "indice" => 0,
            ]
        );
    }
}
