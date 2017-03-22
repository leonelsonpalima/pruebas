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
/*
|--------------------------------------------------------------------------
| Ruta Original
|--------------------------------------------------------------------------
*/
/*
Route::get('/', function () {
    return view('welcome');
});
*/
/*
|--------------------------------------------------------------------------
| Probando la plantilla
|--------------------------------------------------------------------------
*/
Route::get('/', function () {
    return view('formulariobase.index');
});

Route::get('/pagina', function () {
    return view('formulariobase.index');
});
/*
Route::get('/datatable', function () {
    return view('datatable.index');
});
*/

Route::get('/datatable', 'datatable\datatable@index');
Route::post('/datatable/buscar', 'datatable\datatable@buscar');

