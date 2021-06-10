<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(Request $request){
        $username = $request->username;
        $password = $request->password;

        $cridential = [
            'email'     => $username,
            'password'  => $password
        ];

        if(Auth::attempt($cridential)){
            $user = Auth::user();
            $ability = ['create', 'read', 'update', 'delete'];
            $token  = $user->createToken("api-token", $ability)->plainTextToken;
            return response()->json([
                'status' => true,
                'user'   => $user,
                'token'  => $token,
                'abilities' => $ability 
            ]);
        }else{
            return response()->json([
                'status' => false,
                'message' => "Login gagal"
            ]);
        }
    }
}
