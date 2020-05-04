<?php

namespace App\CustomHelpers;

use Illuminate\Http\JsonResponse;

class JSONResponseHelper
{

    private $statusCodeStr = "status code";
    private $messageStr = "message";
    private $resourceStr = "resource";

    private $unauthorizedCode = 401;
    private $badRequestCode = 400;
    private $createdCode = 201;
    private $successCode = 200;

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
    public function badRequestJSONResponse($message = "Bad request, verify your content"){
        return response()->json([
            $this->statusCodeStr => $this->badRequestCode,
            $this->messageStr => $message
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
     * Return a well JSON 200 Response for success
     * @return JsonResponse JSON formatted Response
     */
    public function successJSONResponse($resource) {
        return response()->json([
            $this->statusCodeStr => $this->successCode,
            $this->messageStr => "Success",
            $this->resourceStr => $resource
        ])->setStatusCode($this->successCode);
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
