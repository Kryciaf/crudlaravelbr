<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmpresasController;

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

Route::get('/', 'App\Http\Controllers\EmpresasController@index');
Route::get('/empresas/novo', 'App\Http\Controllers\EmpresasController@create');
Route::post('/empresas/novo', 'App\Http\Controllers\EmpresasController@store')->name('salvar_empresa');
Route::get('/empresas/list', 'App\Http\Controllers\EmpresasController@show');
Route::get('/empresas/del/{id}', 'App\Http\Controllers\EmpresasController@destroy')->name('excluir_empresa');
Route::get('/empresas/edit/{id}', 'App\Http\Controllers\EmpresasController@edit')->name('editar_empresa');
Route::post('/empresas/edit/{id}', 'App\Http\Controllers\EmpresasController@update')->name('atualizar_empresa');




