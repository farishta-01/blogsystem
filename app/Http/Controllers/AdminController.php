<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\user;
use App\Models\Category;




class adminController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware('admin');
    // }
    public function category()
    {
        return view('adminpanel.category');
    }
    public function register()
    {
        return view('adminpanel.registeradmin');
    }
    public function login()
    {
        return view('adminpanel.loginadmin');
    }
    // public function post()
    // {
    //     return view('adminpanel.post');
    // }
    public function admin()
    {
        return view('adminpanel.admin');
    }



    public function loginpost(Request $req)
    {
        if ($req->ajax()) {
            $req->validate([
                'email' => 'required|email',
                'password' => 'required',
            ]);

            $credentials = $req->only('email', 'password');
            if (Auth::attempt($credentials)) {
                $user = Auth::user();

                if ($user->role === 'admin') {
                    return response()->json(['success' => 'Logged in successfully as admin', 'role' => 'admin']);
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
        return redirect(route('login'));
    }





}