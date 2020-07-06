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
    return view('welcome');
});

Auth::routes();

Route::post('follow/{user}', 'FollowsController@store');

//posts
Route::get('/p', 'PostsController@index');
Route::get('/p/create', 'PostsController@create');
Route::get('/p/{post}', 'PostsController@show');
Route::get('/p/{post}/edit', 'PostsController@edit');
Route::patch('/p/{post}', 'PostsController@update');//fonctionne mais tout le monde peut modifier à revoir
Route::delete('/p/{post}', 'PostsController@destroy');
Route::post('/p', 'PostsController@store');

//profils
Route::get('/profil/{user}', 'ProfilsController@index')->name('profil.show');
Route::get('/profil/{user}/edit', 'ProfilsController@edit')->name('profil.edit');
Route::patch('/profil/{user}', 'ProfilsController@update')->name('profil.update');






Route::view('contact', 'contact');
Route::view('a-propos', 'a-propos');