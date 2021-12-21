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

Route::get('/', 'HomeController@index')->name('home');

Route::get('post/{id}','AdminPostController@post')->name('home.post');

Route::group(['middleware'=>'admin'],function(){


    Route::get('/admin', function(){
        return view('admin.index');
    })->name('admin');
    Route::resource('admin/user','AdminUserController');

    Route::resource('admin/post','AdminPostController');

    Route::resource('admin/category','CategoryController');

    Route::resource('admin/media','AdminMediaController');

    Route::delete('/delete/media','AdminMediaController@deletemedia');

    

    // Route::get('admin/media/upload',['as'=>'admin.media.upload','uses'=>'AdminMediaController@store']);

    Route::resource('admin/comments','PostCommentsController');

    Route::resource('admin/comment/replies','CommentRepliesController');


});

