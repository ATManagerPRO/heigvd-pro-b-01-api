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
    // User GET
    Route::group(['middleware' => ['authTokenGET'], 'prefix' => 'users/{user}/'], function () {
        // User todos
        Route::get('todolists', ['uses' => 'UserController@todolists']);
        Route::get('todolists/shared', ['uses' => 'UserController@todolistsShared']);
        Route::get('todos', ['uses' => 'UserController@todos']);
        Route::get('todos/today', ['uses' => 'UserController@todosToday']);

        // User goals
        Route::get('goals', ['uses' => 'UserController@goals']);
        Route::get('goaltodos', ['uses' => 'UserController@goalTodos']);
        Route::get('goaltodos/today', ['uses' => 'UserController@goaltodosToday']);

        // User tags
        Route::get('tags', ['uses' => 'UserController@tags']);
    });

    // Google sign-in
    Route::post('auth', ['uses' => 'GoogleAuthController@login']);
    // Folders
    Route::post('folders', ['uses' => 'FolderController@store']);
    // Todolist
    Route::post('todolists', ['uses' => 'TodolistController@store']);
    // TodoList sharing
    Route::post('todolists/{todolist}/share', ['uses' => 'TodolistController@share']);
    // Goal
    Route::post('goals', ['uses' => 'GoalController@store']);
    // GoalTodo
    Route::post('goaltodos', ['uses' => 'GoalTodoController@store']);
    Route::patch('goaltodos/{goaltodo}/done', ['uses' => 'GoalTodoController@updateDone']);
    // Tag
    Route::post('tags', ['uses' => 'TagController@store']);
    // Todo
    Route::post('todos', ['uses' => 'TodoController@store']);
    Route::patch('todos/{todo}/favorite', ['uses' => 'TodoController@updateFavorite']);
    Route::patch('todos/{todo}/done', ['uses' => 'TodoController@updateDone']);
    Route::delete('todos/{todo}', ['uses' => 'TodoController@destroy']);
});


// Google sign-in test
Route::get('google_auth/login', ['uses' => 'GoogleAuthController@loginTest']);
