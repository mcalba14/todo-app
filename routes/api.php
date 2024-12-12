<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\AddTaskController;

Route::post('login', '\App\Http\Controllers\API\LoginController@login');

Route::post('register', '\App\Http\Controllers\API\RegisterController@register');

Route::get('tasks/{user_id}', '\App\Http\Controllers\API\TaskController@tasks');

Route::post('/dashboard', '\App\Http\Controllers\API\TaskController@dashboard');
Route::post('/update', '\App\Http\Controllers\API\TaskController@update');
Route::post('/delete', '\App\Http\Controllers\API\TaskController@delete');

Route::post('/createtasks', [AddTaskController::class, 'createtasks']);
