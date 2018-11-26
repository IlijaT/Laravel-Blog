<?php

use App\Task;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\TasksController;

Route::get('/', 'PostsController@index');
Route::get('/posts/create', 'PostsController@create');
Route::get('/posts/{post}', 'PostsController@show');
Route::post('/posts', 'PostsController@store');

Route::get('/posts/tags/{tag}', 'TagsController@index');

Route::post('/posts/{post}/comments', 'CommentsController@store');

Route::get('/register', 'Auth\RegistrationController@create');
Route::post('/register', 'Auth\RegistrationController@store');
Route::get('/login', 'Auth\SessionController@create');
Route::post('/login', 'Auth\SessionController@store')->name('login');
Route::get('/logout', 'Auth\SessionController@destroy');
