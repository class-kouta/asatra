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

Route::group(['prefix' => '','middleware'=>'auth'],function(){
    Route::get('/mypage', 'MypageController@index')->name('mypage');

    Route::get('/posts/myposts', 'PostController@showMyPosts')->name('posts.myposts');
    Route::get('/posts/create', 'PostController@create')->name('posts.create');
    Route::post('/posts/create_confirm', 'PostController@createConfirm')->name('posts.create_confirm');
    Route::post('/posts/store', 'PostController@store')->name('posts.store');
    Route::get('show/{id}/{post}','PostController@show')->name('posts.show');
    Route::get('/posts/edit/{id}','PostController@edit')->name('posts.edit');
    Route::post('/posts/edit_confirm/{id}','PostController@editConfirm')->name('posts.edit_confirm');
    Route::post('/posts/update/{id}','PostController@update')->name('posts.update');
    Route::post('/posts/destroy/{id}','PostController@destroy')->name('posts.destroy');

    Route::post('/posts/{id}/comments','CommentController@store')->name('comments.store');
    Route::post('/posts/{post_id}/comments/{comment_id}','CommentController@destroy')->name('comments.destroy');

    Route::get('/posts/nice/{post}', 'NiceController@nice')->name('nice');
    Route::get('/posts/unnice/{post}', 'NiceController@unnice')->name('unnice');
});
