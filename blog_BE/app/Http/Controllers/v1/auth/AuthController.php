<?php

namespace App\Http\Controllers\v1\auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function register(UserRequest $request)
    {
        $validator = $request->validated();

        try {
            $user = User::create([
                'name' => $validator['name'],
                'email' => $validator['email'],
                'password' => bcrypt($validator['password']),
                'isAdmin' => '0',
            ]);

            $tokenResult = $user->createToken('MyApp');
            $token = $tokenResult->plainTextToken;

            return response()->json([
                'status' => true,
                'message' => 'Successfully created user!',
                'accessToken' => $token,
            ], 200);
        } catch (Exception $e) {
            return response()->json([
                'status' => false,
                'error' => 'Failed to create user!'
            ], 500);
        }
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);
        $user = User::where('email', $request['email'])->first();
        if (!$user || !Hash::check($request['password'], $user->password)) {
            return response()->json([
                'status' => false,
                'message' => 'Invalid Credentials'
            ], 401);
        }

        $token = $user->createToken('MyApp')->plainTextToken;
        return response()->json([
            'status' => true,
            'token_type' => 'Bearer',
            'message' => 'Login successfull',
            'accessToken' => $token,
        ]);
    }


    public function user(Request $request)
    {
        return response()->json($request->user());
    }

    public function logout(Request $request)
    {
        $request->user()->tokens()->delete();
        return response()->json([
            'message' => 'User is logged out.'
        ]);
    }
}
