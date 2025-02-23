<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\User\UserResource;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8',
            'role_id' => 'required|integer|exists:roles,id'
        ]);

        if($validator->fails()){
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $user = User::create(array_merge(
            $validator->validated(),
            ['password' => bcrypt($request->password)]
        ));

        $token = $user->createToken('UserToken')->accessToken;

        return response()->json([
            'token' => $token,
            'user' => $user,
            'message' => 'User registered successfully'
        ], 200);
    }
    public function login(Request $request)
    {
        $credentials = $request->only(['email', 'password']);

        if(auth()->attempt($credentials)){
            $user = auth()->user();
            $token = $user->createToken('UserToken')->accessToken;

            return response()->json([
                'token' => $token,
                'user' => $user,
                'message' => 'User logged in successfully'
            ], 200);
        } else {
            return response()->json([
                'message' => 'Unauthorized'
            ], 401);
        }
    }
    public function user()
    {
        $user = auth()->user();
        return new UserResource($user);
    }
}
