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
Route::get('/p/create', 'PostsController@create');
Route::post('/p', 'PostsController@store');
Route::get('/p/{post}', 'PostsController@show');
Route::delete('/p/{post}', 'PostsController@destroy');//rajout ici
//profils
Route::get('/profil/{user}', 'ProfilsController@index')->name('profil.show');
Route::get('/profil/{user}/edit', 'ProfilsController@edit')->name('profil.edit');
Route::patch('/profil/{user}', 'ProfilsController@update')->name('profil.update');






Route::view('contact', 'contact');
Route::view('a-propos', 'a-propos');