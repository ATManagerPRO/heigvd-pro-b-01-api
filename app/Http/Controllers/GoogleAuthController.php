<?php

namespace App\Http\Controllers;

use App\CustomHelpers\JSONResponseHelper;
use App\TodoList;
use App\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class GoogleAuthController extends Controller
{
    public function loginTest() {
        return view('googleAuth/login', [
            'test' => "test"
        ]);
    }

    /**
     * Creates a secure user token using env var "AUTH_TOKEN_LENGTH" as length.
     * @return false|string
     */
    private function createUserToken() {
        try {
            $uniqueToken = bin2hex(random_bytes(env("AUTH_TOKEN_LENGTH")));
            $uniqueToken = substr($uniqueToken, 0, env("AUTH_TOKEN_LENGTH")); // Ensure token length
            return $uniqueToken;
        } catch(\Exception $e) {
            return "";
        }
    }

    /**
     * Generates new user token and update/create user entry in database.
     * Creates default todolist for new users as well.
     * @param Request $request
     * @return JsonResponse
     */
    public function login(Request $request)
    {
        $JSONResponseHelper = new JSONResponseHelper();

        $idToken = $request->bearerToken();

        // Verify sign in token with Google API
        $client = new \Google_Client(['client_id' => env("GOOGLE_CLIENT_ID")]);
        $payLoad = $client->verifyIdToken($idToken);

        if ($payLoad) { // Valid token
            $userId = $payLoad['sub']; // Google user ID

            // Check user is already is our database from its Google ID
            $user = User::where('googleId', $userId)->get()->first();

            // Create our user's unique secret token
            $uniqueToken = GoogleAuthController::createUserToken();
            if($uniqueToken == "") {
                // Appropriate source of randomness couldn't be found or params are causing errors
                return $JSONResponseHelper->customJSONResponse(500, "Could not create secure API token");
            }

            if (empty($user)) { // User doesn't exist which means it's his first login
                // => insert in database
                $newUser = new User;
                $newUser->googleId = $userId;
                $newUser->email = $payLoad['email'];
                $newUser->tokenAPI = $uniqueToken;
                $newUser->save();
                $newUserId = $newUser->getAttributeValue('id');

                // Create default todolist
                $newDefaultList = new TodoList;
                $newDefaultList->user_id = $newUserId;
                $newDefaultList->title = "My Tasks";
                $newDefaultList->save();

                return $JSONResponseHelper->createdJSONResponse(['userId' => $newUserId, 'tokenAPI' => $uniqueToken]);

            } else { // User already exists, renew token
                User::where('googleId', $userId)->update(['tokenAPI' => $uniqueToken]);

                return $JSONResponseHelper->successJSONResponse(['userId' => $user['id'],'tokenAPI' => $uniqueToken]);
            }

        } else { // Invalid token
            return $JSONResponseHelper->badRequestJSONResponse("Invalid client request");
        }
    }
}
