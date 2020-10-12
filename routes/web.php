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

Route::get('/', function () {
    return view('auth/login');
});


	


Route::resource('contrato/agrupacion','AgrupacionController')->middleware('auth');
Route::get('contrato/agrupacion/{id}/provincia/{cod_depa}','AgrupacionController@provincia');
Route::get('contrato/agrupacion/{id}/distrito/{cod_depa}/{cod_prov}','AgrupacionController@distrito');
Route::get('contrato/agrupacion/provinciaCreate/{cod_depa}','AgrupacionController@provinciaCreate');
Route::get('contrato/agrupacion/distritoCreate/{cod_depa}/{cod_prov}','AgrupacionController@distritoCreate');

Route::get('contrato/agrupacion/{id}/deleteIntegrante/{idDetalle}','AgrupacionController@deleteIntegrante');
Route::get('contrato/agrupacion/{id}/deleteVideos/{idVideos}','AgrupacionController@deleteVideos');
//Route::get('contrato/agrupacion/{id}/obtenerDetalle','AgrupacionController@obtenerDetalle');


Route::resource('contrato/evento','EventoController')->middleware('auth');
Route::resource('contrato/contrato','ContratoController')->middleware('auth');

Route::resource('item/enumerado','EnumeradoController')->middleware('auth');

Route::resource('seguridad/persona','PersonaController')->middleware('auth');


Route::get('seguridad/persona/{id}/provincia/{cod_depa}','PersonaController@provincia');
Route::get('seguridad/persona/{id}/distrito/{cod_depa}/{cod_prov}','PersonaController@distrito');
Route::get('seguridad/persona/provinciaCreate/{cod_depa}','PersonaController@provinciaCreate');
Route::get('seguridad/persona/distritoCreate/{cod_depa}/{cod_prov}','PersonaController@distritoCreate');

/**PERFIL */
Route::get('seguridad/perfil',['as'=> 'perfil.edit', 'uses' => 'PerfilController@edit']);
Route::patch('seguridad/perfil',['as'=> 'perfil.update', 'uses' => 'PerfilController@update']);
Route::get('seguridad/provincia/{cod_depa}','PerfilController@provincia');
Route::get('seguridad/distrito/{cod_depa}/{cod_prov}','PerfilController@distrito');
/**END PERFIL */
Auth::routes();


Route::get('/home', 'HomeController@index')->name('home');
Route::get('/logout', 'Auth\LoginController@logout')->name('logout' );

//Route::get('seguridad/perfil/{id}','PersonaController@edit')->middleware('auth');


