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
        $data = DB::table('clients')->get();
        //$this->showRawData($data);
        $this->showTableData($data);
    }

    private function showRawData(Collection $p_Data) {
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
