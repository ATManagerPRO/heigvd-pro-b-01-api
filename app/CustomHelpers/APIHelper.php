<?php

namespace App\CustomHelpers;

use App\User;
use Illuminate\Http\Request;

class APIHelper
{

    public function __construct()
    {
    }

    /**
     * Return the connected user (correspond to the tokenAPI pass to the
     * Auth bearer token (HTTP request), null otherwise
     * @param Request $request The HTTP request
     * @return User the user if the tokenAPI is correct, null otherwise
     */
    public function getUserByTokenAPI(Request $request){
        $tokenAPI = $request->bearerToken();
        $user = User::select('id')->where(['tokenAPI' => $tokenAPI])->first();

        return $user;
    }

}
