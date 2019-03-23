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
        echo "---";
        echo "<pre>";
        print_r(Auth::user());
    }else{
        echo "...";
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
    
    Route::resource('/roles','rolesController');
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
    Route::get('/ambientes', function () {
        return view('ambientes');
    });
    Route::get('/sedes', function () {
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
    Route::post('/rolescrear', 'rolesController@store');
});

