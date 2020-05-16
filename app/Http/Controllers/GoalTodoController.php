<?php

namespace App\Http\Controllers;

use App\CustomHelpers\APIHelper;
use App\CustomHelpers\JSONResponseHelper;
use App\Goal;
use App\GoalTodo;
use DateInterval;
use DateTime;
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

    /**
     * Marks a given goalTodo as done and creates the next goalTodo according to its goal object.
     * @param $goalTodoId
     * @param Request $request
     * @return JsonResponse
     */
    public function updateDone($goalTodoId, Request $request) {
        // Fetch our custom helpers
        $APIHelper = new APIHelper();
        $JSONResponseHelper = new JSONResponseHelper();

        $connectedUser = $APIHelper->getUserByTokenAPI($request);

        // User unauthorized (i.e. wrong API token)
        if(empty($connectedUser)) {
            return $JSONResponseHelper->unauthorizedJSONResponse();
        } else {
            // Fetch the goalTodo from URL param
            $goalTodo = GoalTodo::where('id', $goalTodoId)->first();

            // goalTodo doesn't exists
            if(empty($goalTodo)){
                return $JSONResponseHelper->badRequestJSONResponse('Incorrect goalTodo');
            } else {
                // User must be Goal's author
                $goal = $goalTodo->goal;

                if($connectedUser->getAttributeValue('id') != $goal->getAttribute('user_id')) {
                    // User doesn't own the goal
                    return $JSONResponseHelper->unauthorizedJSONResponse();
                } else {
                    // Set goalTodo as done and set quantity
                    GoalTodo::where('id', $goalTodoId)
                        ->update(['dateTimeDone' => now(), 'quantityDone' => $request->input('quantity')]);

                    // Create next goalTodo
                    return $this->createNextGoalTodo($goal);
                }
            }
        }
    }

    /**
     * Creates the next goalTodo of a goal, according to its set interval.
     * Auth/permission verification should be operated before calling this function as it will perform anyway.
     * @param Goal $goal
     * @return JsonResponse
     */
    private function createNextGoalTodo(Goal $goal) {
        $JSONResponseHelper = new JSONResponseHelper();
        $previousGoalTodo = GoalTodo::where(['goal_id' => $goal->getAttributeValue('id')])
            ->orderBy('created_at', 'desc')->first(); // Most recent goalTodo relative to the given goal
        $intervalChar = ucfirst($goal->interval()->first()['label'][0]); // Get interval's char (d, w, m, or y), uppercase

        try {
            // Calculate new dueDate
            $goalEndDate = new DateTime($goal->endDate);
            $newDueDate = new DateTime($previousGoalTodo['dueDate']);
            $newDueDate->add(
                new DateInterval('P' . $goal->getAttributeValue('intervalValue') . $intervalChar)
            );

            if($newDueDate > $goalEndDate) { // End date has been reached => don't create next goalTodo
                return $JSONResponseHelper->successJSONResponse("End date has been reached: no more goalTodo");
            } else { // Create next goalTodo normally
                $newGoalTodo = new GoalTodo();
                $newGoalTodo->dueDate = $newDueDate->format('Y-m-d G:i:s');
                $newGoalTodo->goal()->associate($goal);
                $newGoalTodo->save();
            }

            return $JSONResponseHelper->createdJSONResponse($newGoalTodo->getAttributes());
        } catch (\Exception $e) {
            // Error occurred
            return $JSONResponseHelper->badRequestJSONResponse('Could not create next goalTodo');
        }
    }

}
