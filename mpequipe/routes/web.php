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

/* Route::get('/', function () {
    return view('welcome');
}); */
Route::view('/', 'accueil');
Route::view('/infos', 'infos');
Route::view('/contact', 'contact');
Route::view('/espace-membre', 'espace-membre');
Route::view('/espace-admin', 'espace-admin');
Route::view('/liste-services', 'liste-services');
Route::view('/profil', 'profil');