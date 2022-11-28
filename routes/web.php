<?php

use App\Http\Controllers\UtilisateurController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SejourController;

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
    return view('home')->with('erreur', "");
});

Route::get('/home', function () {
    return view('home')->with('erreur', "");
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

Route::get('/getListeSejour', 'App\Http\Controllers\SejourController@listeSejours')->middleware('Connect');

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




//Réalisation de l’ajout d’un nouveau traitement

Route::get('/getSejourParMois', 'App\Http\Controllers\SejourController@getListeMois');


Route::post('/rechercheSejoursMois/{i}', [
    'as' => 'postRechercheMoisSejour',
    'uses' => 'App\Http\Controllers\SejourController@postRechercheMoisSejour'
]);



//mise à jour global de mot de passe

Route::get('/miseajour/{pwd}',  [UtilisateurController::class, 'updatePassword']);
