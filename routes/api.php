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
//Route::post('register', 'Api\RegisterController@register');

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

// Route::middleware('auth:api')->namespace('Api')->group(function () {
//     //Usuarios
//     Route::apiResource('/usuarios', 'UsuariosController');

//     //Congregaciones
//     //Route::post('/ingreso', 'CongregacionesController@loginByCongregacion');

//     //Territorios
//     // Route::get('/territorios/{id}', 'TerritoriosController@indexByCongregacion');
//     // Route::post('/territorio', 'TerritoriosController@storeByCongregacion');
//     // Route::post('/completado', 'TerritoriosController@completeTerritorio');
// });

Route::group(['middleware' => 'cors'], function()
{
    Route::get('/territorios/{id}', 'Api\TerritoriosController@indexByCongregacion');
    
    Route::get('/search/{idCong}/{text}', 'Api\TerritoriosController@searchTerritorio');

    Route::apiResource('/estados', 'Api\EstadosController');

    Route::get('/territorio/{id}', 'Api\TerritoriosController@getTerritorioById');

    Route::get('/manzanas/{id}', 'Api\ManzanasController@indexByTerritorio');

    Route::post('/ingreso', 'Api\CongregacionesController@loginByCongregacion');

    Route::post('/complete', 'Api\TerritoriosController@completeRegister');

    //Route::get('/manzanaComplete/{id}', 'Api\ManzanasController@completeManzana');

    Route::get('/registros/{id}', 'Api\RegistrosController@indexByCongregacion');

    //Route::post('/registrar', 'Api\RegistrosController@store');

    Route::post('/storeTerritorio', 'Api\TerritoriosController@storeByCongregacion');
});
