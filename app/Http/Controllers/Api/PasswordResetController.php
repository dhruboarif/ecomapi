<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\PasswordResetRequest;
use App\Mail\PasswordResetLink;
use Illuminate\Support\Facades\Mail;

class PasswordResetController extends Controller
{
    public function sendPasswordResetEmail(PasswordResetRequest $request){

        $url = \URL::temporarySignedRoute('resetpassword', now()->addMinute(30), ['email', $request->email]);
        $ur = str_replace(env('APP_URL'), env('FRONTEND_URL'), $url);
        //dd($urfinal);

        return response()->json([
            'message' => 'Password Reset link sent to your email'
        ]);
    }
}
