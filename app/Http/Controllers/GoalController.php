<?php

namespace App\Http\Controllers;

use App\CustomHelpers\APIHelper;
use App\CustomHelpers\JSONResponseHelper;
use App\Goal;
use App\Interval;
use DateTime;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class GoalController extends Controller
{

    /**
     * Store a new goal came from the POST request
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

            // Fetch the interval object that match the intervalLabel that comes from the request input
            $interval = Interval::where('label', $request->input('intervalLabel'))->first();
            // Interval must be correct
            if(empty($interval)){
                return $JSONResponseHelper->badRequestJSONResponse();
            }

            try {
                $goal = new Goal();
                $goal->label = $request->input("label");
                $goal->quantity = $request->input("quantity");
                $goal->intervalValue = $request->input("intervalValue");
                $goal->endDate = $request->input("endDate");
                $goal->interval()->associate($interval);
                $goal->user()->associate($connectedUser);

                $goal->save();

                return $JSONResponseHelper->createdJSONResponse($goal->getAttributes());

            }catch(\Exception $e){
                // Error occurred
                return $JSONResponseHelper->badRequestJSONResponse();
            }

        }
    }

}
