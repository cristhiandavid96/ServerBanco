<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


Route::ApiResource('users','UserController');
Route::post('login', 'AuthController@login');
Route::post('logout', 'AuthController@logout');
Route::ApiResource('transacciones', 'TransaccionesController');
Route::get('cuentasbancarias/cuentas', 'CuentasBancariasController@cuentas');
Route::get('cuentasbancarias/all', 'CuentasBancariasController@cuentasAll');
Route::ApiResource('cuentasbancarias', 'CuentasBancariasController');