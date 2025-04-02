<?php

namespace App\Http\Controllers;

use App\Models\User;
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

        /*try {
            DB::connection()->getPdo();
            return "Conectado com o banco de dados";
        }
        catch (\PdoException $e) {
            return "Erro ao conectar com o banco de dados: " . $e->getMessage();
        }*/

        $text_username = $request->input("text_username");
        $text_password = $request->input("text_password");

        //$user = User::all()->toArray();
        //dd($user);

        $user = User::where("name", $text_username)
            ->where("deleted_at", null)
            ->first();

        if ( ! $user ) {
            return redirect()
                ->back()
                ->withInput()
                ->with('loginError', 'E-mail ou senha inválidos');
        }

        if ( ! password_verify($text_password, $user->password) ) {
            return redirect()
                ->back()
                ->withInput()
                ->with('loginError', 'E-mail ou senha inválidos');
        }

        $user->last_login = now();
        $user->save();

        session([
            "user" => [
                "id" => $user->id,
                "username" => $user->name
            ]
        ]);

        echo "Login realizado com sucesso!<br>";

    }

    public function logout() {
        
        session()->forget("user");
        session()->flush();
        return redirect()->to("/login");

    }

}
