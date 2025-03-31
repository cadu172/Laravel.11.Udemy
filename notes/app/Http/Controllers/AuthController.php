<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AuthController extends Controller
{

    public function login() {
        return view("login");
    }

    public function loginSubmit(Request $request) {

        $request->validate(
            [
                "text_username" => "required|email",
                "text_password" => "required|min:8|max:20",
            ],
            [
                "text_username.required" => "O campo e-mail não foi preenchido, este campo é obrigatório",
                "text_username.email" => "O campo e-mail não é um e-mail válido",
                "text_password.required" => "O campo senha não foi preenchido, este campo é obrigatório",
                "text_password.min" => "O tamanho mínimo do password é :min caracteres",
                "text_password.max" => "O tamanho maximo do password é :max caracteres",
            ]
        );

        try {
            DB::connection()->getPdo();
            return "Conectado com o banco de dados";
        }
        catch (\PdoException $e) {
            return "Erro ao conectar com o banco de dados: " . $e->getMessage();
        }        

    }

    public function logout() {
        return "Logout";
    }

}
