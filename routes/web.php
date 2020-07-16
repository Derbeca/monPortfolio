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
