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

Route::get('/', function () {
    return view('index');
})->name('homepage');

Route::get('/login', function() {
    return view('login');
})->name('login');

Route::get('/signup', function() {
    return view('signup');
})->name('signup');

Route::get('/review', function() {
    return view('review/index');
})->name('review');

Route::get('/review_detail', function() {
    return view('review_detail');
})->name('review_detail');

Route::get('/profil', function() {
    return view('/profil/index');
})->name('profil');

Route::resource('profil', 'ProfilController');
Route::resource('post_film', 'Post_filmController');

//Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
