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

    public function submitForm(Request $request): void {

        $request->validate([
            'name' => 'required|max:255',
            'country' => 'required|max:255',
        ]);

        echo "submitForm executado";
    }

    public function setSession(): View {
        session(['name' => 'Carlos Eduardo']);
        return view('home');
    }


    public function clearSession(): View {
        session()->forget('name');
        return view('home');
    }

}
