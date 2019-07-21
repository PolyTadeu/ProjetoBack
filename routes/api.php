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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get ('mostraBranch/{id}', 'BranchController@showBranch');
Route::get ('listaBranch', 'BranchController@listBranch');
Route::post('criaBranch','BranchController@createBranch');
Route::put('atualizaBranch/{id}','BranchController@updateBranch');
Route::delete('deletaBranch/{id}', 'BranchController@deleteBranch');



Route::get ('mostraExemplary/{id}', 'ExemplaryController@showExemplary');
Route::get ('listaExemplary', 'ExemplaryController@listExemplary');
Route::post('criaExemplary','ExemplaryController@createExemplary');
Route::put('atualizaExemplary/{id}','ExemplaryController@updateExemplary');
Route::put('relacaoExemplary/{id}','ExemplaryController@relationExemplary');
Route::put('deletarRelacaoExemplary/{id}','ExemplaryController@relationDeleteExemplary');
Route::delete('deletaExemplary/{id}', 'ExemplaryController@deleteExemplary');
