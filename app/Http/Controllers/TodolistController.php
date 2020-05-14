<?php

namespace App\Http\Controllers;

use App\CustomHelpers\APIHelper;
use App\CustomHelpers\JSONResponseHelper;
use App\Folder;
use App\TodoList;
use App\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class TodolistController extends Controller
{

    /**
     * Store a new todolist came from the POST request
     * Request $request
     * @return JsonResponse jsonArray
     */
    public function store(Request $request){
        // Fetch our custom helpers
        $APIHelper = new APIHelper();
        $JSONResponseHelper = new JSONResponseHelper();

        // Fetch the user correspond to the API Token in request
        $connectedUser = $APIHelper->getUserByTokenAPI($request);

        // User unauthorized (like wrong token API)
        if(empty($connectedUser)) {
            return $JSONResponseHelper->unauthorizedJSONResponse();
        }
        // User authorized
        else{
            // If folder_id are correct, return the Folder object, null otherwise
            // /!\ If we put wrong value in folder_id (e.g "dede", we'll link to a null folder)
            $folder = Folder::find($request->input('folder_id'));

            try {
                $todoList = new TodoList();
                $todoList->title = $request->input('title');
                $todoList->author()->associate($connectedUser);
                $todoList->folder()->associate($folder);

                $todoList->save();

                //Success
                return $JSONResponseHelper->createdJSONResponse($todoList->getAttributes());
            }catch(\Exception $e){
                // Error
                return $JSONResponseHelper->badRequestJSONResponse();
            }

        }
    }

    /**
     * Store into the pivot table a new shared todolist for a specific user
     * @param $todoListId the todolist we want to share
     * @param Request $request
     * @return JsonResponse jsonArray
     */
    public function share($todoListId, Request $request){
        // Fetch our custom helpers
        $APIHelper = new APIHelper();
        $JSONResponseHelper = new JSONResponseHelper();

        // Fetch the user correspond to the API Token in request
        $connectedUser = $APIHelper->getUserByTokenAPI($request);

        // User unauthorized (like wrong token API)
        if(empty($connectedUser)) {
            return $JSONResponseHelper->unauthorizedJSONResponse();
        }
        // User authorized
        else {
            $sharedTodoList = TodoList::where(["id" => $todoListId, "user_id" => $connectedUser->getAttributes()['id']])->first();
            $invitedUser = User::where(['email' => $request->input('invitedEmail')])->first();
            // Shared todolist doesn't belongs to the connected user or the invitedUser doesn't exists or are the same as the connected one
            if(empty($sharedTodoList) || empty($invitedUser) || $connectedUser->getAttributes()['id'] == $invitedUser->getAttributes()['id']){
                return $JSONResponseHelper->badRequestJSONResponse();
            }
            // Shared todolist and invited user OK
            else{
                try {
                    $invitedUser->todosListInvited()->attach($sharedTodoList, ['permissionLevel' => 1]); // Permission level not managed for now
                }catch(\Exception $e){
                    // Error (like duplicated invitation, etc...)
                    return $JSONResponseHelper->badRequestJSONResponse();
                }
                //Success
                return $JSONResponseHelper->createdJSONResponse(["message"=>"todo list successfully shared"]);
            }
        }
    }

}
