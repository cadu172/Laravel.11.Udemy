<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;

class MainController extends Controller
{
    public function showView(): View
    {
        //return view('admin.newPage3');

        //metodo 1
        /*$data = ["name"=>"Metodo1 - Carlos Eduardo", "phone" => "123456789"];
        return view('admin.newPage3', $data);*/

        //metodo 2
        //return view('admin.newPage3', ["name"=>"Metodo2 - Carlos Eduardo", "phone" => "123456789"]);

        //metodo 3
        /*return view('admin.newPage3')
            ->with("name", "Metodo3 - Carlos Eduardo")
            ->with("phone", "123456789");*/

        //metodo 4
        $name = "Metodo4 - Carlos Eduardo";
        $phone = "123456789";
        return view('admin.newPage3', compact('name', 'phone'));

    }
}
