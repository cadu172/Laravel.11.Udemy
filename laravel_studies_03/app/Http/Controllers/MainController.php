<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;

class MainController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function showPage(): View
    {

        $data = [
            'Carlos' => [
                'Inglês',
                'Português',
                'Japonês',
                'Russo'
            ],
            'Eduardo' => [
                'Português',
                'Mandarin'
            ],
        ];

        return view('home',['pessoas'=>$data]);
    }
}
