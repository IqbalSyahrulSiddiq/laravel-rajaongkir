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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/provinsi','RajaongkirController@listProvinsi')->name('rajaongkir.provinsi');
Route::get('/getkokabAsal','RajaongkirController@listKokab')->name('rajaongkir.kokab');
Route::get('/getkokabTujuan','RajaongkirController@listKokabTujuan')->name('rajaongkir.kokabTujuan');