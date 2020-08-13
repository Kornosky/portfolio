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
Auth::routes();
Route::get('/', function () {
    return view('welcome');
});
Auth::routes();
Route::get('/about', function () {
    return view('about');
});
Auth::routes();
Route::get('/gameDev', function () {
    return view('gameDev');
});
Auth::routes();
Route::get('/2dworks', function () {
    return view('2dworks');
});
Auth::routes();
Route::get('/3dworks', function () {
    return view('3dworks');
});
Auth::routes();
Route::get('/blog', function () {
    return view('blog');
});
Auth::routes();
Route::get('/contact', function () {
    return view('contact');
});
Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
