<?php

namespace App\Http\Controllers\API;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    //
    public function register(Request $request): JsonResponse
    {

        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email|unique:users,email,except,id',
            'password' => 'required',
            // 'confirm_password' => 'required|same:password',
        ]);


        if($validator->fails()){
            return response()->json([
                'status' => false,
                'message' => 'Validation error',
                'errors' => $validator->errors()], 422);
        }

            $input = $request->all();
            $input['password'] = Hash::make($input['password']);
            $user = User::create($input);
            // $success['name'] =  $user->name;

            return response()->json(['status' => 'success', 'message' => 'User registered successfully.']);

    }
}
