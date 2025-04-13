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

    public function rotaComParametro($id)
    {
        return '(MainController.rotaComParametro) Rota com parametro: ' . $id;
    }

    public function rotaComDoisParametros($value1, $value2)
    {
        return '(MainController.rotaComDoisParametros) Rota com dois parametros: valor1 => ' . $value1 . " e valor2 => " . $value2;
    }

    public function rotaComDoisParametrosComRequest(Request $request, $value1, $value2)
    {
        return '(MainController.rotaComDoisParametrosComRequest) Rota com dois parametros: valor1 => ' . $value1 . " e valor2 => " . $value2;
    }

    public function rotaComParametroOpcional($value1 = null)
    {
        return '(MainController.rotaComParametroOpcional) Rota com parametro opcional: ' . $value1;
    }

    public function rotaComParametroObrigatorioOpcional($value1, $value2 = null)
    {
        return '(MainController.rotaComParametroObrigatorioOpcional) Rota com parametro obrigatorio e opcional: ' . $value1 . ' e ' . $value2;
    }

    public function showUserPost($user_id, $post_id)
    {
        return '(MainController.showUserPost) User ID: ' . $user_id . ' Post ID: ' . $post_id;
    }

}
