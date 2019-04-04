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
/*
    Componentes
*/
Route::resource('usuarios', 'UserController', ['only'=>['index', 'show']]);
/*
    Componentes por Ambiente
*/
Route::resource('componentesAmbiente', 'AmbientesApiController', ['only'=>['show']]);
