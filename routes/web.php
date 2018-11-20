<?php

use App\Task;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\TasksController;

Route::get('/tasks', 'TasksController@index');
Route::get('/tasks/{task}', 'TasksController@show');
