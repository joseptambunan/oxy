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

Route::get('/', 'UserController@index')->name("login");
Route::post('/login','UserController@login');
Route::get('/logout','UserController@logout');
Route::get('/forgot','UserController@forgot');
Route::post('/reset','UserController@reset');

Route::get('/admin','AdminController@index');

Route::get('/book/add','BookController@add');
Route::post('/book/store','BookController@store');
Route::get('/book/show/{id}','BookController@show');
Route::post('/book/update','BookController@update');

Route::get('/author','AuthorController@index');
Route::get('/author/add','AuthorController@add');
Route::get('/author/show/{id}','AuthorController@show');
Route::post('/author/store','AuthorController@store');
Route::post('/author/update','AuthorController@update');
