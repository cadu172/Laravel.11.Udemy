<?php

use App\Http\Controllers\MainController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\OnlyAdmin;
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

/**
 * routes with constraints
 */
Route::get('exp1/{value}', function($value) {
    return $value;
})->where('value', '[0-9]+');

Route::get('exp2/{value}', function($value) {
    return $value;
})->where('value', '[A-Za-z0-9]+');

Route::get('exp3/{value1}/{value2}', function($value1, $value2) {
    return "value1 = $value1 and value2 = $value2";
})->where(
    [
        'value1' => '[0-9]+',
        'value2' => '[A-Za-z0-9]+'
    ]
);

/**
 * ROTAS NOMEADAS
 */
Route::get('/rota-nomeada', function() {
    return 'Rota Nomeada';
})->name('rota.nomeada');

Route::get('/rota-redirecionada', function() {
    return redirect()->route('rota.nomeada');
});

Route::prefix('admin')->group(function() {
    Route::get('/home', [MainController::class, 'index']);
    Route::get('/about', [MainController::class, 'about']);
    Route::get('/management', [MainController::class, 'showUserPost']);
});

Route::get('/admin/only', function() {
    return 'Rota admin only';
})->middleware(OnlyAdmin::class);

Route::middleware(OnlyAdmin::class)->group(function() {

    Route::get('/admin/only2', function() {
        return 'Rota admin only 2';
    });

    Route::get('/admin/only3', function() {
        return 'Rota admin only 3';
    });

});

Route::controller(UserController::class)->group(function() {
    Route::get('/user', 'index');
    Route::get('/user/create', 'create');
    Route::post('/user/store', 'store');
    Route::get('/user/{id}', 'show');
    Route::get('/user/{id}/edit', 'edit');
    Route::put('/user/{id}', 'update');
    Route::delete('/user/{id}', 'destroy');
});

Route::fallback(function() {
    return 'Rota não encontrada';
});
