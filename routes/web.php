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
    return view('login');
});
Route::get('login', function () {
    return view('login');
});

Route::get('usuarios/nuevo', function () {
    return view('registrar');
});
Route::get('/inicio', function () {
    return view('form');
});
Route::get('formulario', function () {
    return view('form');
});
Route::get('/usuarios', function () {
    return view('usuarios');
});
Route::get('/componentes', function () {
    return view('componentes');
});
Route::get('/config_componentes', function () {
    return view('config_componentes');
});
Route::get('/dashboard', function () {
    return view('dashboard');
});
Route::get('/horarios', function () {
    return view('horarios');
});
Route::get('/ambientes', function () {
    return view('ambientes');
});
Route::get('/sedes', function () {
    return view('sedes');
});