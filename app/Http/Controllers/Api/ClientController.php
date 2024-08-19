<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

use Tymon\JWTAuth\Facades\JWTAuth;

class ClientController extends Controller
{
    public function loginpost(Request $req)
    {
        // dd(123);
        $req->validate([
            'username' => 'required|regex:/^[a-zA-Z0-9_]+$/',
            'password' => 'required',
        ]);

        $credentials = $req->only('username', 'password');
        // dd( $credentials);
        if (Auth::attempt($credentials)) {
            $user = Auth::user();

            $token = JWTAuth::fromUser($user);
            if ($user->role === 'author') {
                return response()->json([
                    'success' => 'Logged in successfully',
                    'role' => 'author',
                    'token' => $token
                ], 200);
            } else {
                return response()->json(['error' => 'You do not have permission to access the admin panel.'], 403);
            }
        } else {
            return response()->json(['error' => 'Invalid credentials.'], 401, compact('token'));
        }
    }

    public function logout(Request $req)
    {
        $req->user()->currentAccessToken()->delete();
        return response()->json(['success' => 'Logged out successfully'], 200);
    }

    public function registeration(Request $req)
    {
        $validator = Validator::make($req->all(), [
            'f_name' => 'required',
            'l_name' => 'required',
            'email' => 'required|email|unique:users,email',
            'username' => 'required|regex:/^[a-zA-Z0-9_]+$/|unique:users,username',
            'password' => 'required|min:6',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()->first()], 422);
        }

        $user = new User;
        $user->f_name = $req->f_name;
        $user->l_name = $req->l_name;
        $user->email = $req->email;
        $user->username = $req->username;
        $user->password = Hash::make($req->password);

        if ($user->save()) {
            $token = JWTAuth::fromUser($user);
            return response()->json(['success' => 'User registered successfully', 'token' => $token], 201);
        } else {
            return response()->json(['error' => 'Failed to register user'], 500);
        }
    }
    public function protectedEndpoint(Request $request)
    {
        try {
            $user = JWTAuth::parseToken()->authenticate();
        } catch (\Tymon\JWTAuth\Exceptions\TokenExpiredException $e) {
            return response()->json(['error' => 'Token expired'], 401);
        } catch (\Tymon\JWTAuth\Exceptions\TokenInvalidException $e) {
            return response()->json(['error' => 'Invalid token'], 401);
        } catch (\Tymon\JWTAuth\Exceptions\JWTException $e) {
            return response()->json(['error' => 'Token is missing'], 401);
        }

        // Access user data or perform actions requiring authentication
        return response()->json(['message' => 'Success! You are authorized.']);
    }
}

