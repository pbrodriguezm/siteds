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

// Route::get('/', function () {
//     return view('osi');
// });

Route::get('/', 'WsController@todosMetodos');
Route::get('X12N_To_Objects/', 'WsController@x12nTo');
Route::get('String_To_X12N/', 'WsController@toX12N');
Route::get('callSoap/', 'WsController@callSoap');
Route::get('callSoap2/', 'WsController@callSoap2');
Route::get('callSoapCustom/', 'WsController@callSoapCustom');
Route::get('getConsultaAsegNomResponse/', 'WsController@getConsultaAsegNomResponse');
Route::get('resConsultaAsegNom/', 'WsController@resConsultaAsegNom');
Route::get('cuerpoRequest/', 'WsController@cuerpoRequest');
Route::get('detalleproceso/', 'WsController@detalleProceso');
Route::get('herramientas/', 'WsController@herramientas');
