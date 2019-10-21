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
/

/ Route::get('/', function () {
    return view('welcome');
}); */
Route::view('/', 'accueil');
Route::view('/infos', 'infos');
Route::view('/contact', 'contact');
Route::view('/espace-membre', 'espace-membre');
Route::view('/espace-admin', 'espace-admin');
Route::view('/liste-services', 'liste-services');
Route::view('/connexion', 'connexion');
Route::view('/validation', 'validation');
Route::view('/inscription', 'inscription');

Route::view('/profil', 'profil');
Route::view('/conditions-generales', 'conditions-generales');
Route::view('/mentions-legales', 'mentions-legales');
Route::view('/espace-admin', 'espace-admin');

Route::any('/contact/store', 'ContactController@store');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');