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

Route::get('/', 'TopController@index')->name('top');

Auth::routes();

Route::get('/posts/show_guest/{post}','PostController@showGuest')->name('posts.show_guest');

Route::group(['prefix' => 'posts','middleware'=>'auth'],function(){
    Route::get('create', 'PostController@create')->name('posts.create');
    Route::post('create_confirm', 'PostController@createConfirm')->name('posts.create_confirm');
    Route::post('store', 'PostController@store')->name('posts.store');
    Route::get('show/{post}','PostController@show')->name('posts.show');
    Route::get('edit/{post}','PostController@edit')->name('posts.edit');
    Route::post('edit_confirm/{post}','PostController@editConfirm')->name('posts.edit_confirm');
    Route::post('update/{post}','PostController@update')->name('posts.update');
    Route::post('destroy/{post}','PostController@destroy')->name('posts.destroy');

    Route::post('/{post}/comments','CommentController@store')->name('comments.store');
    Route::post('/{post}/comments/{comment}','CommentController@destroy')->name('comments.destroy');

    Route::get('/nice/{post}', 'NiceController@nice')->name('nice');
    Route::get('/unnice/{post}', 'NiceController@unnice')->name('unnice');
});

Route::group(['prefix' => 'profile','middleware'=>'auth'],function(){
    Route::get('myposts/{page}', 'PostController@showMyPosts')->name('profile.myposts');
    Route::get('notifications', 'ProfileController@notification')->name('profile.notifications');
    Route::get('edit', 'ProfileController@edit')->name('profile.edit');
    Route::post('update', 'ProfileController@update')->name('profile.update');
    Route::get('withdraw_confirm','ProfileController@withdrawConfirm')->name('profile.withdraw_confirm');
    Route::post('withdraw/{id}','ProfileController@withdraw')->name('profile.withdraw');
});

Route::group(['prefix' => 'footer'],function(){
    Route::get('faq',function(){
        return view('footer.faq');
    })->name('footer.faq');

    Route::get('/faq/about_withdraw',function(){
        return view('footer.faq.about_withdraw');
    })->name('footer.faq.about_withdraw');
});

Route::get('nopage',function(){
    return view('nopage');
})->name('nopage');
