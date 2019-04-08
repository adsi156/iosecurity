<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

/*
    Componentes
*/
Route::resource('componentes', 'Componentes\ComponentesController', ['except'=>['create', 'edit']]);
Route::resource('componentesconsulta', 'componentesApiController', ['only'=>['show','index']]);
/*
    Configuración Componentes
*/
//Route::resource('componentes/config', 'Componentes\ComponentesConfigController', ['except'=>['create', 'edit']]);
/*
    Tipos Componentes
*/
Route::resource('componentes\tipo', 'Componentes\TiposComponentesController', ['except'=>['create', 'edit']]);
/*
    Ambientes
*/    
Route::resource('ambientesconsulta', 'consultaAmbienteApiController', ['only'=>['index']]);
/*
    Usuarios
*/
Route::resource('usuarios', 'UserController', ['only'=>['index','store','update', 'show','destroy']]);
/*
    Componentes por Ambiente
*/
Route::resource('componentesAmbiente', 'AmbientesApiController', ['only'=>['show']]);

