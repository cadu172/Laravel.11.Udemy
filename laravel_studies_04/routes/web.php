<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

//Route::view('/','home');

Route::get('/mysql', function() {

    try {
        
        DB::connection()->getPdo();

        dd("Conexão MYSQL realizada com sucesso: " . DB::connection()->getDatabaseName());

    } catch (\Exception $e) {
        
        dd("Erro ao conectar-se: " . $e->getMessage());

    }

});