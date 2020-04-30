<?php

namespace App\Http\Controllers;

use App\Folder;
use App\GoalTodo;
use App\Todo;
use App\TodoList;
use App\Goal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    /**
     * Display a JSON listing all todolists linked to a specific user.
     * The json will display at the beginning all todolists without folder
     * and after, all user's folder with their linked todolists
     *
     * @return array jsonArray
     */
    public function todolists($id)
    {
        $todolistsWithoutFolder = TodoList::where(['user_id' => $id, 'folder_id' => null])->get();
        $foldersContainsTodolists = Folder::where('user_id', $id)->with("todolist")->get();

        $array = [
            "todoLists" => $todolistsWithoutFolder,
            "folders" => $foldersContainsTodolists,
        ];

        return $array;
    }

    /**
     * Returns all the goals a given user
     * @param $id
     * @return array jsonArray
     */
    public function goals($id)
    {
        $goals = Goal::where('user_id', $id)->get();

        $array = [
            "goals" => $goals,
        ];

        return $array;
    }

    /**
     * Returns all todos a given user for today
     * @param $id
     * @return array jsonArray
     */
    public function todosToday($id){

        $todoLists = TodoList::select('id')->where(['user_id' => $id])->get()->toArray();

        $array = [];

        // loop through user's todoList
        foreach ($todoLists as $todoList){

            $todos = Todo::
                where(['todo_list_id' => $todoList['id']])->
                where(DB::raw("DATE(todos.dueDate)"), "=", date('Y-m-d'))->
                get()->
                toArray();

            // Todos exists
            if (!empty($todos)) {
                // Loop through todos
                foreach ($todos as $todo) {
                    // Add todos to the array
                    array_push($array, $todo);
                }
            }

        }

        $result = [
            "todos" => $array
        ];

        return $result;
    }

    /**
     * Returns all goalTodos a given user for today
     * @param $id
     * @return array jsonArray
     */
    public function goalTodosToday($id){
        $goals = Goal::select('id', 'label', 'quantity')->where(['user_id' => $id])->get()->toArray();

        $array = [];

        // loop through user's goals
        foreach ($goals as $goal){

                $goalTodos = GoalTodo::
                    where(['goal_id' => $goal['id']])->
                    where(DB::raw("DATE(goal_todos.dueDate)"), "=", date('Y-m-d'))->
                    get()->
                    toArray();

                // GoalTodos exists
                if (!empty($goalTodos)) {
                    // Loop through goalTodos
                    foreach ($goalTodos as $goalTodo) {
                        // Create a new array with goalData we have and goalTodos
                        array_push($array, array_merge($goalTodo, $goal));
                    }
                }

        }

        $result = [
            "goalTodos" => $array
        ];

        return $result;
    }

}
