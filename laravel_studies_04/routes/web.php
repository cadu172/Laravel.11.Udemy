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


Route::get('/sqlite', function() {

    try {
        
        DB::connection()->getPdo();

        dd("Conexão SQLITE realizada com sucesso: " . DB::connection()->getDatabaseName());

    } catch (\Exception $e) {
        
        dd("Erro ao conectar-se: " . $e->getMessage());

    }

});


Route::get('/mysql_test_two_databases', function() {

    try {
        
        DB::connection('mysql_app')->getPdo();
        echo "Conexão mysql_auth realizada com sucesso: " . DB::connection()->getDatabaseName();
        echo "<hr />";

        DB::connection('mysql_users')->getPdo();
        echo "Conexão mysql_users realizada com sucesso: " . DB::connection()->getDatabaseName();
        echo "<hr />";


    } catch (\Exception $e) {
        
        dd("Erro ao conectar-se: " . $e->getMessage());

    }

});
