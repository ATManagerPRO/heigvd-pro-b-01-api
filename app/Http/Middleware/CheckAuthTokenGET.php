<?php

namespace App\Http\Middleware;

use App\CustomHelpers\APIHelper;
use App\CustomHelpers\JSONResponseHelper;
use Closure;

class CheckAuthTokenGET
{
    /**
     * Check that the given bearer authorizes to the user request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        // Check if given token corresponds to the correct user
        $APIHelper = new APIHelper();
        $user = $APIHelper->getUserByTokenAPI($request);

        // API token must refer to an existing user whose id must correspond to route parameter (user) id
        if(empty($user) || $user->getAttributeValue('id') != $request->route('user')) {
            // Return error
            $JSONResponseHelper = new JSONResponseHelper();
            return $JSONResponseHelper->unauthorizedJSONResponse();
        }

        // API token could be verified => proceed
        return $next($request);
    }
}
