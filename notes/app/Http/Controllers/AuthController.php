<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{

    public function login() {
        return view("login");
    }

    public function loginSubmit(Request $request) {
        //return "Login submit exec";
        echo $request->get("text_username");
        echo "<br />";
        echo $request->get("text_password");
    }

    public function logout() {
        return "Logout";
    }

}
