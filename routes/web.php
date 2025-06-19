<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\PredioController;

Route::get('/', function () {
    return view('welcome');
});

//habilitar una ruta especifica para el mapa(hay que crear funciones adicionales)
//nota: antes de el resource, o sino coje error
Route::get('/clientes/mapa',[ClienteController::class, 'mapa']);

//habilitando acceso a los recursos del controlador (index,create,store,etc)
Route::resource('clientes',ClienteController::class);

//habilitando los recursos del controlador predios
Route::resource('predios',PredioController::class);