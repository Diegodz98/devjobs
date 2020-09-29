<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/','InicioController')->name('inicio');



Auth::routes(['verify' => true]);
Route::group(['middleware' => ['auth','verified']], function ()
{
    Route::get('/home', 'HomeController@index')->name('home');
    Route::get('/vacantes', 'VacanteController@index')->name('vacantes.index');
    Route::get('/vacantes/create', 'VacanteController@create')->name('vacantes.create');
    Route::post('/vacantes/store', 'VacanteController@store')->name('vacantes.store');
    //subir imagen
    Route::post('/vacantes/imagen', 'VacanteController@imagen')->name('vacantes.imagen');
    //cambiar estado
    Route::post('/vacantes/{vacante}', 'VacanteController@estado')->name('vacantes.estado');
    //eliminar vacante
    Route::delete('/vacantes/{vacante}', 'VacanteController@destroy')->name('vacantes.destroy');
    Route::get('/vacantes/{vacante}/edit', 'VacanteController@edit')->name('vacantes.edit');
    Route::put('/vacantes/{vacante}', 'VacanteController@update')->name('vacantes.update');



    //borrar imagen
    Route::post('/vacantes/borrarimagen', 'VacanteController@borrarimagen')->name('vacantes.borrarimagen');
    //ruta notificaciones
    Route::get('7notificaciones', 'NotificacionesController')->name('notificaciones');
    Route::get('/candidatos/{id}', 'CandidatoController@index')->name('candidatos.index');

});
Route::get('/vacantes/buscar', 'VacanteController@resultados')->name('vacantes.resultados');
Route::post('/buscar/vacante', 'VacanteController@buscar')->name('vacantes.buscar');

//muestra los trabajos en el frontedn sin autenticacion
Route::get('/vacantes/{vacante}', 'VacanteController@show')->name('vacantes.show');
//Enviar datos
Route::post('/candidatos/store', 'CandidatoController@store')->name('candidatos.store');
//Categorias



Route::get('/categorias/{categoria}', 'CategoriaController@show')->name('categorias.show');





