<?php

namespace App\Http\Controllers;

use App\CustomHelpers\APIHelper;
use App\CustomHelpers\JSONResponseHelper;
use App\Folder;
use App\TodoList;
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

}
