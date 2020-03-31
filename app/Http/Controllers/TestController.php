<?php

namespace App\Http\Controllers;


use App\TodoList;

class TestController extends Controller
{

    public function test(){

        $todoList = TodoList::where('id', 3)->firstOrFail();
        $linkedTodos = $todoList->todos;
        dd($todoList);
        //dd($linkedTodos);

    }

}
