<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ApiLoginController extends Controller
{

    public function login(Request $request)
    {

        $email = $request->email;
        $password = $request->password;

        if (Auth::attempt(['email' => $email, 'password' => $password], true)) {
            $user = Auth::user();
            $success['token'] = $user->createToken('Giris')->accessToken;
            $success['status'] = true;

            return response()->json(['result' => $success], 200);
        }

            $success['status'] = false;
            return response()->json(['result' => $success], 401);
    }

}
