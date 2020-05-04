<?php

namespace App\CustomHelpers;

use Illuminate\Http\JsonResponse;

class JSONResponseHelper
{

    private $statusCodeStr = "Status code";
    private $messageStr = "Message";
    private $resourceStr = "Resource";

    private $unauthorizedCode = 401;
    private $badRequestCode = 400;
    private $createdCode = 201;

    public function __construct()
    {
    }

    /**
     * Return a well JSON formatted 401 Response for unauthorized
     * @return JsonResponse JSON formatted Response
     */
    public function unauthorizedJSONResponse(){
        return response()->json([
            $this->statusCodeStr => $this->unauthorizedCode,
            $this->messageStr => "Unauthorized"
        ])->setStatusCode($this->unauthorizedCode);
    }

    /**
     * Return a well JSON 400 Response for bad request (wrong input, etc...)
     * @return JsonResponse JSON formatted Response
     */
    public function badRequestJSONResponse(){
        return response()->json([
            $this->statusCodeStr => $this->badRequestCode,
            $this->messageStr => "Bad request, verify your content"
        ])->setStatusCode($this->badRequestCode);
    }

    /**
     * Return a well JSON 201 Response for Created resource
     * @return JsonResponse JSON formatted Response
     */
    public function createdJSONResponse($resource) {
        return response()->json([
            $this->statusCodeStr => $this->createdCode,
            $this->messageStr => "Created",
            $this->resourceStr => $resource
        ])->setStatusCode($this->createdCode);
    }

    /**
     * Return a well JSON custom code and message Response
     * @return JsonResponse JSON formatted Response
     */
    public function customJSONResponse($code, $message) {
        return response()->json([
            $this->statusCodeStr => $code,
            $this->messageStr => $message
        ])->setStatusCode($code);
    }

}
