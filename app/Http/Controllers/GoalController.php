<?php

namespace App\Http\Controllers;

use App\GoalTodo;
use Illuminate\Http\Request;

class GoalController extends Controller
{

    /**
     * Returns all goalTodos of the given goal.
     * @param $id
     * @return array jsonArray
     */
    public function goaltodos($id)
    {
        $goalTodos = GoalTodo::where('goal_id', $id)->get();

        $array = [
            "goalTodos" => $goalTodos,
        ];

        return $array;
    }
}
