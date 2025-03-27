<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MainController extends Controller
{
    public function index($value) {
        return view("main",data: [
            "value" => $value
        ]);
    }

    public function page2($value) {
        return view("page2",data: [
            "value" => $value
        ]);
    }

    public function page3($value) {
        return view("page3",data: [
            "value" => $value
        ]);
    }
}
