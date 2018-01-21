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


//Route::get('/', function () {
//    return view('welcome');
//});

// Authentication Scaffolding
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


// Posts
Route::get('/', 'PostsController@index');
//Route::get('/posts/{post}', 'PostsController@show');
//Route::get('/posts/create', 'PostsController@create');
//Route::post('/posts', 'PostsController@store');
Route::resource('posts', 'PostsController');

// Posts Tags
Route::get('/posts/tags/{tag}', 'TagsController@index');

// Tasks
Route::get('/tasks', 'TasksController@index');
Route::get('/tasks/{task}', 'TasksController@show');

// Comments
Route::post('/posts/{post}/comments', 'CommentsController@store');