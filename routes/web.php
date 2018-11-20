<?php

use App\Task;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\TasksController;

Route::get('/posts', 'PostsController@index');
Route::get('/posts/{post}', 'PostsController@show');
