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
    // Users
    Route::get('users/{user}/todolists', ['uses' => 'UserController@todolists']);
    Route::get('users/{user}/goals', ['uses' => 'UserController@goals']);

    // Todolists
    Route::get('todolists/{todolist}/todos', ['uses' => 'TodolistController@todos']);

    // Goals
    Route::get('goals/{goal}/goaltodos', ['uses' => 'GoalController@goaltodos']);
});
