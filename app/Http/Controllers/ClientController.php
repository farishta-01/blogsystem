<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class ClientController extends Controller
{
    public function register()
    {
        return view('frontend.registerClient');
    }
    public function login()
    {
        return view('frontend.loginClient');
    }


    public function loginpost(Request $req)
    {
        if ($req->ajax()) {
            $req->validate([
                'username' => 'required|regex:/^[a-zA-Z0-9_]+$/',
                'password' => 'required',
            ]);

            $credentials = $req->only('username', 'password');
            if (Auth::attempt($credentials)) {
                $user = Auth::user();

                if ($user->role === 'author') {
                    return response()->json(['success' => 'Logged in successfully as admin', 'role' => 'author']);
                } else {
                    return response()->json(['error' => 'You do not have permission to access the admin panel.']);
                }
            } else {
                return response()->json(['error' => 'Invalid credentials.'], 401);
            }
        } else {
            return response()->json(['error' => 'Invalid request.'], 400);
        }
    }


    public function logout()
    {
        Auth::logout();
        return redirect(route('home'));
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
        $user->username = $req->username; // Use the provided username, not email
        $user->password = Hash::make($req->password);

        if ($user->save()) {
            // Attempt to log in the user
            $credentials = $req->only('username', 'password');
            if (Auth::attempt($credentials)) {
                $user = Auth::user();

                if ($user->role === 'author') {
                    return response()->json(['success' => 'User registered and logged in successfully', 'role' => 'author']);
                } else {
                    return response()->json(['error' => 'You do not have permission to access the admin panel.']);
                }
            } else {
                return response()->json(['error' => 'Failed to log in user.'], 401);
            }
        } else {
            return response()->json(['error' => 'Failed to register user'], 500);
        }
    }


}








