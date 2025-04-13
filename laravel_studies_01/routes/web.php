<?php

use App\Http\Controllers\MainController;
use Illuminate\Support\Facades\Route;

//Route::view('/','home');

/**
 *
 * get
 * post
 * match
 * any
 * get index controller
 * get about controller
 * redirect
 * redirect permanent
 * view
 * view com dados
*/

Route::get('/rota-get', function() {
    return 'Rota GET';
});

Route::post('/rota-post', function() {
    return 'Rota POST';
});

Route::match(['get', 'post'], '/rota-match', function() {
    return 'Rota MATCH';
});

Route::any('/rota-any', function() {
    return 'Rota ANY';
});

Route::GET('/rota-index',[MainController::class,'index'] );
Route::GET('/rota-about',[MainController::class,'about'] );

Route::redirect('/rota-redirect', '/rota-get');
Route::permanentRedirect('/rota-redirect-permanent', '/rota-get');

Route::view('rota-view', 'home');
Route::view('rota-view-data', 'home', ['myName' => 'Carlos Eduardo']);

/**
 * ROTAS COM PARAMETROS
 */
Route::get('/rota-parametro/{id}', [MainController::class, 'rotaComParametro']);
Route::get('/rota-dois-parametros/{value1}/{value2}', [MainController::class, 'rotaComDoisParametros']);
Route::get('/rota-dois-parametros-request/{value1}/{value2}', [MainController::class, 'rotaComDoisParametrosComRequest']);

Route::get('/rota-parametro-opcional/{value1?}', [MainController::class, 'rotaComParametroOpcional']);
Route::get('/rota-parametro-obrigatorio-opcional/{value1}/{value2?}', [MainController::class, 'rotaComParametroObrigatorioOpcional']);

Route::get('/user/{user_id}/post/{post_id}', [MainController::class, 'showUserPost']);
