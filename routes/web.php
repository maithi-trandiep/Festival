<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\EtablissementController;

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
//     return view('welcome');
// });

Route::get('/home', function () {
    return view('index');
});

Route::get('/listeEtablissements', 'Admin\EtablissementController@index');
Route::get('/listeEtablissements/{idEtab}', 'Admin\EtablissementController@show');
Route::get('/listeEtablissement/create', 'Admin\EtablissementController@create');
Route::PATCH('/listeEtablissement/store', 'Admin\EtablissementController@store');
Route::get('/listeEtablissements/edit/{idEtab}', 'Admin\EtablissementController@edit');
Route::PATCH('/listeEtablissements/update/{idEtab}', 'Admin\EtablissementController@update');
Route::DELETE('/listeEtablissements/delete/{idEtab}', 'Admin\EtablissementController@destroy');

Route::get('/consultationAttributions', function () {
    return view('consultationAttributions');
});

Route::get('/modificationAttributions', function () {
    return view('modificationAttributions');
});
