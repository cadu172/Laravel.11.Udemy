<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Collection;

class MainController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // 1 - executa um select * na tabela clients
        //$clients = DB::table('clients')->get();

        // 2 - converte o model e array
        //$clients = DB::table('clients')->get()->toArray();

        // foreach recursivo e converte cada item da collection em um array
        /*$clients = DB::table('clients')->get()->map(function($item){
            return (array) $item;
        });*/

        // lista somente colunas especificas da tabela retornada pela facade DB
        //$products = DB::table('products')->get(['id','product_name','price']);

        // pluck retorna uma collection contendo apenas a coluna especificada
        //$results = DB::table('products')->pluck('product_name');

        // retorna somente a primera linha da query
        /*$results = DB::table('products')
            ->get()
            ->first();*/

        // retorna somente a ultima linha da query
        /*$results = DB::table('products')
            ->get()
            ->last();*/

        // retorna um id especifico, no exemplo o id 23
        $results = DB::table('products')->find(23);

        // imprime o conteudo da collection em formato de tabela
        //$this->showTableData($products);

        // imprime o conteudo da tabela clients em formato de tabela
        $this->showRawData($results);


    }

    private function showRawData($p_Data) {
        echo '<pre>';
        print_r($p_Data);
        echo '</pre>';
    }

    private function showTableData(Collection $p_Data) {

        echo '<table border="1">';
        echo '<tr>';

        foreach ($p_Data[0] as $key => $value) {
            echo '<th>' . $key . '</th>';
        }

        echo '</tr>';

        foreach ($p_Data as $item) {
            echo '<tr>';
            foreach ($item as $key => $value) {
                echo '<td>' . $value . '</td>';
            }
            echo '</tr>';
        }

        echo '</table>';
    }
}
