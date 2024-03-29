<?php

namespace App\Http\Controllers;

use App\CustomHelpers\JSONResponseHelper;
use App\Folder;
use App\GoalTodo;
use App\Tag;
use App\Todo;
use App\TodoList;
use App\Goal;
use App\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{

    private $JSONResponseHelper;

    public function __construct() {
        $this->JSONResponseHelper = new JSONResponseHelper();
    }

    /**
     * Display a JSON listing all todolists linked to a specific user.
     * The json will display at the beginning all todolists without folder
     * and after, all user's folder with their linked todolists
     *
     * @return JsonResponse The JsonResponse
     */
    public function todolists($userId)
    {
        $todolistsWithoutFolder = TodoList::where(['user_id' => $userId, 'folder_id' => null])->get();
        $foldersContainsTodolists = Folder::where('user_id', $userId)->with("todolist")->get();

        $resource = [
            "todoLists" => $todolistsWithoutFolder,
            "folders" => $foldersContainsTodolists,
        ];

        return $this->JSONResponseHelper->successJSONResponse($resource);
    }

    public function todolistsShared($userId)
    {
        // Fetch the User object correspond to the user we want to display their shared todolist / todos
        $connectedUser = User::where(['id'=>$userId])->first();
        // Fetch the shared todolists for the user
        $todoListsInvited = $connectedUser->todosListInvited->toArray();
        // Create a custom array that will contains all shared todolists with their todos
        $todolistArray = [];
        foreach($todoListsInvited as $todoList){
            $todos = Todo::where('todo_list_id', $todoList['id'])->get()->toArray();
            $todoList["todos"] = $todos;
            array_push($todolistArray, $todoList);
        }

        // Result array, we create a "ghost" folder that is not in the DB, just for the front end need
        $result = [
            "folder" => [
                "id" => -1,
                "user_id" => $userId,
                "label" => "Listes partagées",
                "todolist" => $todolistArray
            ]
        ];

        return $this->JSONResponseHelper->successJSONResponse($result);
    }

    /**
     * Returns all todos a given user
     * @param $userId
     * @return JsonResponse The JsonResponse
     */
    public function todos($userId){

        $todoLists = TodoList::select('id')->where(['user_id' => $userId])->get()->toArray();

        $allTodos = [];

        // loop through user's todoList
        foreach ($todoLists as $todoList){

            $todos = Todo::where(['todo_list_id' => $todoList['id']])->with("tags")->get()->toArray();

            // Todos exists
            if (!empty($todos)) {
                // Loop through todos
                foreach ($todos as $todo) {
                    // Add todos to the array
                    array_push($allTodos, $todo);
                }
            }

        }

        $resource = [
            "todos" => $allTodos
        ];

        return $this->JSONResponseHelper->successJSONResponse($resource);
    }

    /**
     * Returns all todos a given user for today
     * @param $userId
     * @return JsonResponse The JsonResponse
     */
    public function todosToday($userId){

        $todoLists = TodoList::select('id')->where(['user_id' => $userId])->get()->toArray();

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

        $resource = [
            "todos" => $array
        ];

        return $this->JSONResponseHelper->successJSONResponse($resource);
    }

    /**
     * Returns all the goals a given user
     * @param $userId
     * @return JsonResponse The JsonResponse
     */
    public function goals($userId)
    {
        $goals = Goal::where('user_id', $userId)->get();

        $resource = [
            "goals" => $goals,
        ];

        return $this->JSONResponseHelper->successJSONResponse($resource);
    }

    /**
     * Returns all goalTodos a given user for today
     * @param $userId
     * @return JsonResponse The JsonResponse
     */
    public function goalTodosToday($userId){

        $goals = Goal::select('id AS goal_id', 'label', 'endDate AS endDate_goal', 'quantity', 'intervalValue', 'interval_id', 'created_at AS created_at_goal')
            ->where(['user_id' => $userId])->with('interval')->get()->toArray();

        $array = [];

        // loop through user's goals
        foreach ($goals as $goal){

            $goalTodos = GoalTodo::
                where(['goal_id' => $goal['goal_id']])->
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

        $resource = [
            "goalTodos" => $array
        ];

        return $this->JSONResponseHelper->successJSONResponse($resource);
    }

    /**
     * Returns all goalTodos a given user for today
     * @param $userId
     * @return JsonResponse The JsonResponse
     */
    public function goalTodos($userId){

        $goals = Goal::select('id AS goal_id', 'label', 'endDate AS endDate_goal', 'quantity', 'intervalValue', 'interval_id', 'created_at AS created_at_goal')
            ->where(['user_id' => $userId])->with('interval')->get()->toArray();

        $allGoalTodos = [];

        // loop through user's goals
        foreach ($goals as $goal){

            $goalTodos = GoalTodo::
                where(['goal_id' => $goal['goal_id']])->
                get()->
                toArray();

            // GoalTodos exists
            if (!empty($goalTodos)) {
                // Loop through goalTodos
                foreach ($goalTodos as $goalTodo) {
                    // Create a new array with goalData we have and goalTodos
                    array_push($allGoalTodos, array_merge($goalTodo, $goal));
                }
            }

        }

        $resource = [
            "goalTodos" => $allGoalTodos
        ];

        return $this->JSONResponseHelper->successJSONResponse($resource);
    }

    /**
     * Return all tags for a specific user
     * @param $userId
     * @return JsonResponse
     */
    public function tags($userId)
    {
        $tags = Tag::where(['user_id' => $userId])->get();

        $resource = [
            "tags" => $tags,
        ];

        return $this->JSONResponseHelper->successJSONResponse($resource);
    }

}
