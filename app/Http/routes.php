<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/


Route::auth();

Route::get('/', 'HomeController@index');

//admin后台
Route::group(['middleware' => 'auth', 'namespace' => 'Admin', 'prefix' => 'admin'], function() {
    //首页
    Route::get('/', 'HomeController@index');
    //文章
    Route::resource('article', 'ArticleController');
    //评论
    Route::resource('comment', 'CommentController');

});
/***********前台*********/
//文章
Route::get('article/{id}', 'ArticleController@show');
//评论
Route::post('comment', 'CommentController@store');