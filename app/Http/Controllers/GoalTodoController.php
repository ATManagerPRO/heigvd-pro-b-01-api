<?php

namespace App\Http\Controllers;

use App\CustomHelpers\APIHelper;
use App\CustomHelpers\JSONResponseHelper;
use App\Goal;
use App\GoalTodo;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class GoalTodoController extends Controller
{

    /**
     * Store a new goaltodo came from the POST request
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

            // Fetch the goal matches with the goal label from the request and the connected user
            // (because we can only add a goaltodo to a goal of the current user)
            $goal = Goal::where(['label' =>$request->input('goalLabel'), 'user_id' => $connectedUser->getAttributes()['id']])->first();

            // Linked goal must be correct
            if(empty($goal)){
                return $JSONResponseHelper->badRequestJSONResponse();
            }

            try {
                $goalTodo = new GoalTodo();
                $goalTodo->quantityDone = $request->input('quantityDone');
                $goalTodo->dateTimeDone = $request->input('dateTimeDone');
                $goalTodo->dueDate = $request->input('dueDate');
                $goalTodo->goal()->associate($goal);

                $goalTodo->save();

                return $JSONResponseHelper->createdJSONResponse($goalTodo->getAttributes());

            }catch(\Exception $e){
                // Error occurred
                return $JSONResponseHelper->badRequestJSONResponse();
            }

        }
    }

}
