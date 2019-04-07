<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {

    // Auth::logout();

    if(Auth::check()){
        return view('dashboard');
    }else{
        return view('login');
    }
    // return view('login');
});
Route::get('login', function () {
    return view('login');
})->name('login');

Route::get('usuarios/nuevo', 'UserController@create');
Route::post('usuarios', 'UserController@store');
Route::post('validar', 'LoginController@authenticate');


Route::middleware(['auth'])->group(function () {
    
    Route::resource('/sedes','SedesController');
    Route::resource('/roles','rolesController');
    Route::resource('/ambientes','AmbientesController');
    Route::resource('/tipoComponente','Componentes\TiposComponentesController');
    Route::resource('/componentes', 'Componentes\ComponentesController');
    Route::resource('/configcomponentes', 'Componentes\ComponentesConfigController');
    
    Route::get('/inicio', function () {
        return view('form');
    });
    Route::get('formulario', function () {
        return view('form');
    });
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
    Route::get('/horarios', function () {
        return view('horarios');
    });
    Route::get('/ambientescrear', function () {
        return view('ambientesmaestro');
    });
    Route::get('/sedescrear', function () {
        return view('sedes');
    });
    Route::get('/usuarios', function () {
        return view('usuarios');
    });
    Route::get('/usuarioscrear', function () {
        return view('usuariosmaestro');
    });
    Route::get('/rolescrear', function () {
        return view('rolesmaestro');
    });
    Route::get('/componentescrear', function () {
        return view('componentesmaestro');
    });
    Route::get('/configcomponentescrear', function () {
        return view('configcomponentesmaestro');
    });
    Route::post('/rolescrear', 'rolesController@store');

    Route::post('/ambientescrear', 'AmbientesController@store');

    Route::post('/componentescrear', 'Componentes\ComponentesController@store');

    Route::post('/configcomponentescrear', 'Componentes\ComponentesConfigController@store');
});

