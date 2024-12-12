<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    //
    public function login(Request $request){

        if(Auth::attempt(['email' => $request->email, 'password' => $request->password])){
            $user = Auth::user();

            return response()->json([
                'status' => 'success',
                'data' => [
                    'id' => $user->id,
                    'name' => $user->name,
                    'email' => $user->email,
                ]
            ]);

        }else{

            return response()->json([
                'status' => 'error',
                'message' => 'Invalid login credentials'
            ]);

        }
    }
}
