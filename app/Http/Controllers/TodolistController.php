<?php

namespace App\Http\Controllers;

use App\TodoList;
use Illuminate\Http\Request;

class TodolistController extends Controller
{
    /**
     * Display a JSON listing of todos for the specific todolist.
     *
     * @return Response
     */
    public function todos($id)
    {
        dd("Todos of todolist with id : $id ");
    }
}
