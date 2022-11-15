<?php

use App\Http\Controllers\UtilisateurController;
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
    return view('home');
});

Route::get('/home', function () {
    return view('home');
});

/* * *********************************************************************** */
/* * ******  Authentification ********************************************** */
/* * *********************************************************************** */


Route::get('/getLogin', function () {
    return view('authentification/formLogin');
});
Route::get('/getLogout', 'App\Http\Controllers\UtilisateurController@signOut');

Route::post('/login', 'App\Http\Controllers\UtilisateurController@signIn');

/* * *********************************************************************** */
/* * ******  Sejour ********************************************** */
/* * *********************************************************************** */


Route::get('/getListeSejour', 'App\Http\Controllers\SejourController@listeSejours');

/*
 * Ajout Séjour
 */

//get ajout
Route::get('/ajoutSejour', 'App\Http\Controllers\SejourController@ajoutSejour');

// post ajout
Route::post('/ajoutSejour', [
    'as' => 'postajoutSejour',
    'uses' => 'App\Http\Controllers\SejourController@postajoutSejour'
]);

Route::get('/modifierSejour/{id}', 'App\Http\Controllers\SejourController@modification');

//post modif
Route::post('/postmodifierSejour/{id}', [
    'as' => 'postmodifierSejour',
    'uses' => 'App\Http\Controllers\SejourController@postmodifierSejour'
]);
// suppression
Route::get('/supprimerSejour/{id}', 'App\Http\Controllers\SejourController@suppression');

Route::get('/miseajour/{pwd}',  [UtilisateurController::class, 'updatePassword']);
