<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\PasswordResetRequest;

class PasswordResetController extends Controller
{
    public function sendPasswordResetEmail(PasswordResetRequest $request){


        return "ok";
    }
}
