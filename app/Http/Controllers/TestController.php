<?php

namespace App\Http\Controllers;


use App\TodoList;

class TestController extends Controller
{

    public function test(){

        $todoList = TodoList::where('id', 1)->with('folder')->with('author')->with('todos')->get();

        return $todoList;
    }

}
