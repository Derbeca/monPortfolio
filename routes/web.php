<?php

use Illuminate\Support\Facades\Route;

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

});

Route::view('/', 'accueil');

Route::view('/about', 'about');

Route::view('/infos', 'infos');

Route::view('/projets', 'projets');

Route::view('/contact', 'contact');

Route::any('/contact/store', 'ContactController@store');

Route::view('/espace-admin', 'espace-admin');

Route::any('/projet/store', 'ProjetController@store');

Route::any('/projet/supprimer', 'ProjetController@supprimer');

Route::any('/projet/modifier', 'ProjetController@modifier');
