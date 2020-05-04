<?php

namespace App\Http\Controllers;

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
                return response()->json([
                    'label' => "ERROR: Could not create secure API token",
                    'userId' => null,
                    'token' => null
                ])->setStatusCode(500);
            }

            if (empty($user)) { // User doesn't exist which means it's his first login
                // => insert in database
                $newUserId = DB::table('users')->insertGetId([
                    'googleId' => $userId,
                    'email' => $payLoad['email'],
                    'authToken' => $uniqueToken,
                    'created_at' => now(),
                    'updated_at' => now()
                ]);

                // Create default todolist
                DB::table('todo_lists')->insert([
                    'user_id' => $newUserId,
                    'title' => 'My Tasks',
                    'created_at' => now(),
                    'updated_at' => now()
                ]);

                return response()->json([
                    'label' => "SUCCESS: New user",
                    'userId' => $newUserId,
                    'token' => $uniqueToken
                ])->setStatusCode(201);

            } else { // User already exists, renew token
                User::where('googleId', $userId)->update(['authToken' => $uniqueToken]);

                return response()->json([
                    'label' => "SUCCESS: Existing user",
                    'userId' => $user['id'],
                    'token' => $uniqueToken
                ])->setStatusCode(200);
            }

        } else { // Invalid token
            return response()->json([
                'label' => "ERROR: Invalid client request",
                'userId' => null,
                'token' => null
            ])->setStatusCode(400);
        }
    }
}
