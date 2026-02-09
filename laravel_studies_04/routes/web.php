<?php

use Illuminate\Support\Facades\Config;
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

Route::get('/mysql_test_dynamic_connection', function() {

    try {

        Config::set('database.connections.teste',
            [
                'driver' => 'mysql',
                'url' => env('DB_URL'),
                'host' => env('DB_HOST', '127.0.0.1'),
                'port' => env('DB_PORT', '3306'),
                'database' => env('DB_DATABASE', 'laravel'),
                'username' => env('DB_USERNAME', 'root'),
                'password' => env('DB_PASSWORD', ''),
                'unix_socket' => env('DB_SOCKET', ''),
                'charset' => env('DB_CHARSET', 'utf8mb4'),
                'collation' => env('DB_COLLATION', 'utf8mb4_unicode_ci'),
                'prefix' => '',
                'prefix_indexes' => true,
                'strict' => true,
                'engine' => null,
                'options' => extension_loaded('pdo_mysql') ? array_filter([
                PDO::MYSQL_ATTR_SSL_CA => env('MYSQL_ATTR_SSL_CA'),
                ]) : [],
            ]        
        );
        
        DB::connection('teste')->getPdo();
        echo "Conexão teste realizada com sucesso: " . DB::connection()->getDatabaseName();
        echo "<hr />";


    } catch (\Exception $e) {
        
        dd("Erro ao conectar-se: " . $e->getMessage());

    }

});
