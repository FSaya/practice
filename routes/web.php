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

Route::get('/home', 'HomeController@index')->name('home');

//商品一覧画面
Route::get('/list', 'TestUserController@showList')->name('list');

//商品登録画面
Route::get('/create', 'TestUserController@showCreate')->name('create');

//商品登録
Route::post('/store', 'TestUserController@exeStore')->name('store');

//商品詳細画面
Route::get('/{id}', 'TestUserController@showDetail')->name('detail');
