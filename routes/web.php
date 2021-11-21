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

// Route::get('/', function () {
//     $posts = App\Models\Post::all();
//     $data = ['posts' => $posts];
//     return view('top',$data);
// });
Route::get('/', 'TopController@index')->name('top');

Route::get('nopage',function(){
    return view('nopage');
})->name('nopage');

Route::get('/footer/faq/',function(){
    return view('footer.faq');
})->name('footer.faq');

Route::get('/footer/faq/about_withdraw',function(){
    return view('/footer/faq/about_withdraw');
})->name('faq.about_withdraw');

Auth::routes();

Route::get('{post}','PostController@showGuest')->name('posts.show_guest');

Route::group(['prefix' => '','middleware'=>'auth'],function(){
    Route::get('/profile/myposts', 'PostController@showMyPosts')->name('profile.myposts');
    Route::get('/profile/myniceposts', 'PostController@showMyNicePosts')->name('profile.myniceposts');
    Route::get('/profile/mycommentposts', 'PostController@showMyCommentPosts')->name('profile.mycommentposts');
    Route::get('/posts/create', 'PostController@create')->name('posts.create');
    Route::post('/posts/create_confirm', 'PostController@createConfirm')->name('posts.create_confirm');
    Route::post('/posts/store', 'PostController@store')->name('posts.store');
    Route::get('show/{post}','PostController@show')->name('posts.show');
    Route::get('/posts/edit/{post}','PostController@edit')->name('posts.edit');
    Route::post('/posts/edit_confirm/{post}','PostController@editConfirm')->name('posts.edit_confirm');
    Route::post('/posts/update/{post}','PostController@update')->name('posts.update');
    Route::post('/posts/destroy/{post}','PostController@destroy')->name('posts.destroy');

    Route::post('/posts/{post}/comments','CommentController@store')->name('comments.store');
    Route::post('/posts/{post}/comments/{comment}','CommentController@destroy')->name('comments.destroy');

    Route::get('/posts/nice/{post}', 'NiceController@nice')->name('nice');
    Route::get('/posts/unnice/{post}', 'NiceController@unnice')->name('unnice');

    Route::get('/profile/edit', 'ProfileController@edit')->name('profile.edit');
    Route::post('/profile/update', 'ProfileController@update')->name('profile.update');

    Route::get('/profile/withdraw_confirm','ProfileController@withdrawConfirm')->name('profile.withdraw_confirm');
    Route::post('/profile/withdraw/{id}','ProfileController@withdraw')->name('profile.withdraw');

});
