<?php

namespace App\Http\Controllers;

use App\Todo;
use Illuminate\Http\Request;

class TodolistController extends Controller
{
    /**
     * Display a JSON listing of todos (including its tags) for the specific todolist.
     *
     * @return array JsonArray
     */
    public function todos($id)
    {
        $todos = Todo::where('todo_list_id', $id)->with("tags")->get();

        $array = [
            "todos" => $todos,
        ];

        return $array;
    }
}
