<?php

namespace App\Http\Controllers;

use App\CustomHelpers\APIHelper;
use App\CustomHelpers\JSONResponseHelper;
use App\Folder;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;


class FolderController extends Controller
{
    /**
     * Store a new folder came from the POST request
     * Request $request
     * @return JsonResponse jsonArray
     */
    public function store(Request $request)
    {
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
            // Fetch all attributes
            $label = $request->input('label');

            // try to create the resource
            try{
                $folder = new Folder();
                $folder->label = $label;
                $folder->user()->associate($connectedUser);

                $folder->save();

                //Success
                return $JSONResponseHelper->createdJSONResponse($folder->getAttributes());

            }catch(\Exception $e){
                // Error
                return $JSONResponseHelper->badRequestJSONResponse();
            }

        }

    }
}
