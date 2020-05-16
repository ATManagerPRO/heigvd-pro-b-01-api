<?php

namespace App\Http\Controllers;

use App\CustomHelpers\APIHelper;
use App\CustomHelpers\JSONResponseHelper;
use App\Interval;
use App\Tag;
use App\Todo;
use App\TodoList;
use App\User;
use Illuminate\Http\Request;

class TodoController extends Controller
{

    /**
     * Creates a new todo and associates tags
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request) {
        // Fetch our custom helpers
        $APIHelper = new APIHelper();
        $JSONResponseHelper = new JSONResponseHelper();

        // Fetch the user corresponding to the request's API token
        $connectedUser = $APIHelper->getUserByTokenAPI($request);

        // User unauthorized (i.e. wrong API token)
        if(empty($connectedUser)) {
            return $JSONResponseHelper->unauthorizedJSONResponse();
        } else {
            try {

                // Fetch the interval and todolists objects that match the intervalLabel and todo_list_id
                $interval = Interval::where('label', $request->input('intervalLabel'))->first();
                $todoList = TodoList::find($request->input('todo_list_id'));

                $todo = new Todo();
                $todo->title = $request->input('title');
                $todo->details = $request->input('details', null);
                $todo->intervalValue = $request->input('intervalValue', null);
                $todo->intervalEndDate = $request->input('intervalEndDate', null);
                $todo->favorite = 0;
                $todo->dueDate = $request->input('dueDate', null);
                $todo->reminderDateTime = $request->input('reminderDateTime', null);
                $todo->todoList()->associate($todoList);
                $todo->interval()->associate($interval);

                $todo->save();

                // Associate all given tags which must exist
                $tags = $request->input('tags');
                if(!empty($tags)) {
                    foreach($tags as $tagLabel) {
                        $tag = Tag::select('id')->where('label', $tagLabel)->where('user_id', $connectedUser['id'])->first();
                        $todo->tags()->attach($tag);
                    }
                }

                //Success
                // Retrieve created item once again in order to get all fields as well as its tags
                return $JSONResponseHelper->createdJSONResponse(Todo::where('id', $todo['id'])->with('tags')->get());
            }catch(\Exception $e){
                // Error
                return $JSONResponseHelper->badRequestJSONResponse();
            }
        }
    }

    /**
     * Update the favorite field for a _todo
     * @param $todoId
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function updateFavorite($todoId, Request $request) {
        // Fetch our custom helpers
        $APIHelper = new APIHelper();

        $connectedUser = $APIHelper->getUserByTokenAPI($request);

        return $this->updateTodoField($connectedUser, $todoId,"favorite", $request->input("favorite"));
    }

    /**
     * Update the dateTimeDone field for a _todo
     * @param $todoId
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function updateDone($todoId, Request $request) {
        // Fetch our custom helpers
        $APIHelper = new APIHelper();

        $connectedUser = $APIHelper->getUserByTokenAPI($request);

        return $this->updateTodoField($connectedUser, $todoId,"dateTimeDone", $request->input("done"));
    }

    /**
     * Archived the current _todo -> we do soft delete, not really removed from db
     * so we really update the DB archived field from 0 to 1.
     * @param $todoId
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy($todoId, Request $request){
        // Fetch our custom helpers
        $APIHelper = new APIHelper();

        $connectedUser = $APIHelper->getUserByTokenAPI($request);

        // We do soft delete so it's an update of the archived field from 0 to 1 :)
        return $this->updateTodoField($connectedUser, $todoId,"archived", 1);
    }

    /**
     * Update a specific field of the _todo table
     * @param $connectedUser
     * @param $todoId
     * @param $fieldName
     * @param $input
     * @return \Illuminate\Http\JsonResponse
     */
    private function updateTodoField($connectedUser, $todoId, $fieldName, $input){
        $JSONResponseHelper = new JSONResponseHelper();
        // User unauthorized (i.e. wrong API token)
        if(empty($connectedUser)) {
            return $JSONResponseHelper->unauthorizedJSONResponse();
        } else {
            // Fetch the _todo from url param
            $todo = Todo::where('id', $todoId)->first();
            // _todo doesn't exists
            if(empty($todo)){
                return $JSONResponseHelper->badRequestJSONResponse();
            }else{
                // User doesn't have the right to update this _todo !
                if(!$this->canUserUpdateTodo($connectedUser, $todo)){
                    return $JSONResponseHelper->unauthorizedJSONResponse();
                }
                // User have right, go update
                else{
                    try{
                        Todo::where('id', $todoId)->update([$fieldName => $input]);
                        $updatedTodo = Todo::where('id', $todoId)->first()->toArray();
                        return $JSONResponseHelper->successJSONResponse($updatedTodo);
                    }catch(\Exception $e){
                        // DB error
                        return $JSONResponseHelper->badRequestJSONResponse();
                    }
                }
            }

        }
    }

    /**
     * Check if the user can update the _todo or not,
     * It can be update if :
     * 1. The user is the author of the linked todoList
     * 2. The linked todoList has been shared with the user
     * @param $user User The user
     * @param $todo Todo The todo
     * @return bool True if the user can update the _todo, false otherwise
     */
    private function canUserUpdateTodo($user, $todo){
        // Fetch linked todolist
        $todoList = $todo->todoList;
        $invitedUsers = $todoList->usersInvited;

        $isInvited = false;
        foreach($invitedUsers as $invitedUser){
            if($invitedUser->getAttributes()['id'] == $user->getAttributes()['id']){
                $isInvited = true;
                break;
            }
        }

        return $todoList['user_id'] == $user->getAttributes()['id'] || $isInvited;
    }

}


