<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use auth;

class LogoutController extends Controller
{

//    public function __construct()
//    {
//        $this->middleware(['auth:sanctum']);
//    }

    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        //dd($request->all());

        $user = auth->user();
dd($user);
        if ($user) {
            $user->currentAccessToken()->delete();

            return response()->json([
                'message' => 'Token Revoked'
            ], 200);
        }

        return response()->json([
            'message' => 'User not authenticated'
        ], 401);
    }
}
