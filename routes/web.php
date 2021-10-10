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

// Route::get('/home', 'HomeController@index')->name('home');
Route::get('/mypage', 'MypageController@index')->name('mypage');

Route::get('/desc/desc_add', 'DescPostController@index')->name('desc_add');
Route::post('/desc/desc_add_check', 'DescPostController@confirm')->name('desc_add_check');
Route::post('', 'DescPostController@store')->name('store');
