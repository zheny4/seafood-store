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

// GET
Route::get('/', 'PagesController@index');
Route::get('/about', 'PagesController@about');
Route::resource('products', 'ProductsController');

Route::get('/promo', function () {
    return view('promo');
});

Route::get('/bestSellers', function () {
    return view('bestSellers');
});

Route::get('/mostRecent', function () {
    return view('mostRecent');
});

Route::get('/blog', function () {
    return view('blog');
});

Route::get('/contacts', function () {
    return view('contacts');
});

Route::get('/faq', function () {
    return view('faq');
});

Route::get('/delivery', function () {
    return view('delivery');
});

Route::get('/login', function () {
    return view('login');
});

Route::get('/register', function () {
    return view('register');
});

Route::get('/account', function () {
    return view('account');
});

Route::get('/search/{word}', function ($word) {
//    return view('search');
    return "Searching for ".$word.".";
});

// POST

