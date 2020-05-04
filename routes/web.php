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


Route::group(['prefix' => 'api/v1/'], function () {
    // User todos
    Route::get('users/{user}/todolists', ['uses' => 'UserController@todolists']);
    Route::get('users/{user}/todos', ['uses' => 'UserController@todos']);
    Route::get('users/{user}/todos/today', ['uses' => 'UserController@todosToday']);

    // User goals
    Route::get('users/{user}/goals', ['uses' => 'UserController@goals']);
    Route::get('users/{user}/goaltodos', ['uses' => 'UserController@goalTodos']);
    Route::get('users/{user}/goaltodos/today', ['uses' => 'UserController@goaltodosToday']);

    // Auth
    Route::post('auth', ['uses' => 'GoogleAuthController@login']);
});


// Google sign-in test
Route::get('google_auth/login', ['uses' => 'GoogleAuthController@loginTest']);
