<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EncuestaController;
use App\Http\Controllers\CaloriaController;
use App\Http\Controllers\DietaController;
use App\Http\Controllers\EjercicioController;
use App\Http\Controllers\EnfermedadController;
use App\Http\Controllers\ActividadController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CaloriaHasDietaController;




Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('user', 'AuthController@getUsers');

Route::get('encuestas', [EncuestaController::class, 'listarEncuestas']);

Route::get('calorias', [CaloriaController::class, 'listarCalorias']);

Route::get('caloriass', [CaloriaController::class, 'listarCaloria']);

Route::get('encuestass', [EncuestaController::class, 'listarEncuestass']);
  

Route::group([
    'prefix' => 'auth',
    'namespace' => 'App\Http\Controllers',
], function () {
    Route::post('login', 'AuthController@login');
    Route::post('signup/{role?}', 'AuthController@signUp');
  
    Route::middleware('auth:api')->group(function() {
        Route::put('users', 'AuthController@updateUser');
        Route::get('logout', 'AuthController@logout');
        Route::get('user', 'AuthController@user');
        Route::get('user', 'AuthController@getUsers');
        Route::delete('user/{id}', 'AuthController@deleteUser');
        Route::get('calorias', 'CaloriaController@index');
        Route::get('encuesta', 'EncuestaController@index');   
        Route::get('ejercicios', 'EjercicioController@index');
        Route::get('dietasUser', 'DietaController@DietaCaloria');  
        Route::get('encuestass', 'EncuestaController@listarEncuesta');          
    });
});


Route::apiResource('encuesta', EncuestaController::class);
Route::apiResource('caloria', CaloriaController::class);
Route::apiResource('dietas', DietaController::class);
Route::apiResource('ejercicios', EjercicioController::class);
Route::apiResource('enfermedades', EnfermedadController::class);
Route::apiResource('actividad', ActividadController::class);
Route::apiResource('caloriasDietas', CaloriaHasDietaController::class);


