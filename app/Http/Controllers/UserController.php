<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rules\Password;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function register(){
        return view('auth.register');
    }

    public function store(Request $request){
       $validated = $request->validate([
            'name'=> 'required|min:6|max:255',
            'email'=> 'required|email',
            'username'=> 'required|min:3|max:20|alpha_dash|unique:users',
            'phone'=> 'required|starts_with:98|digits:10',
            'password'=> [
                'required',
                Password::min(8)
                    ->letters()
                    ->mixedCase()
                    ->numbers()
                    ->symbols()
                    ->uncompromised()
            ]
        ]);
        $validated['password'] = bcrypt($validated['password']);
        User::create($validated);
        return redirect()->route('login')->with('success', 'Please login to continue');
    }


    public function login(){
        return view('auth.login');
    }

    public function loginValidate(Request $request){
        $validated = $request->validate([
            'email'=> 'required',
            'password'=> 'required'
        ]);
        Auth::attempt($validated);
        if(Auth::check()){
            return redirect()->route('home');
        }
        return back()->with('error', 'Invalid credentials');
    }

    public function logout(){
        Auth::logout();
        return redirect()->route('login');
    }
}
