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

// use Illuminate\Routing\Route;
use Illuminate\Support\Facades\Route;

Route::get('/','HomeController@homepage')->name('homepage');
Route::get('/logout','Auth\LoginController@logout')->name('logout');
Route::get('/post/{id}','HomeController@show')->name('homepage_show');
Route::post('/login','Auth\LoginController@login_user')->name('login');
Route::post('/signup','Auth\LoginController@signup')->name('signup');
Route::group(['middleware' => 'auth'], function () {
    Route::get('/profil/edit','ProfilController@edit')->name('profil.edit');
    Route::put('/profil/edit','ProfilController@update')->name('profil.update');
    Route::post('/komentar/{profil_id}/create','KomentarController@create')->name('komentar.create');

});


Route::get('/login', function() {
    return view('login');
})->name('login');

Route::get('/signup', function() {
    return view('signup');
})->name('signup');

Route::get('/review', function() {
    return view('review/index');
})->name('review');

Route::get('/profil', function() {
    return view('/profil/index');
})->name('profil');

Route::resource('profil', 'ProfilController')->except([
    'edit', 'update'
]);
Route::get('/review/show', function() {
    return view('/review/show');
})->name('show');

Route::resource('profil', 'ProfilController')->except([
    'edit', 'update'
]);
Route::resource('post_film', 'Post_filmController');

//Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
