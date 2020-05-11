<?php

namespace App\Http\Controllers;

use App\CustomHelpers\APIHelper;
use App\CustomHelpers\JSONResponseHelper;
use App\Tag;
use Illuminate\Http\Request;

class TagController extends Controller
{
    /**
     * Creates a new tag for a user.
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request) {
        // Fetch our custom helpers
        $APIHelper = new APIHelper();
        $JSONResponseHelper = new JSONResponseHelper();

        // Fetch the user corresponding to the request's API token
        $connectedUser = $APIHelper->getUserByTokenAPI($request);

        // User unauthorized (i.e. wrong token API)
        if(empty($connectedUser)) {
            return $JSONResponseHelper->unauthorizedJSONResponse();
        } else {
            try {
                $newTag = new Tag();
                $newTag->label = $request->input('label');
                $newTag->user()->associate($connectedUser);

                $newTag->save();

                //Success
                return $JSONResponseHelper->createdJSONResponse($newTag->getAttributes());
            }catch(\Exception $e){
                // Error
                return $JSONResponseHelper->badRequestJSONResponse();
            }
        }
    }
}
