<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rules\Password;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Models\OTP;

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
            'phone'=> 'required',
            'password'=> [
                'required',
            ]
        ]);
        try{
        $validated['password'] = bcrypt($validated['password']);
        $user = User::create($validated);

        //login user
        Auth::login($user);
        return redirect()->route('home');
    }catch(\Exception $e){
        dd($e);
        return back()->with('error', 'Something went wrong');
    }
    }


    public function login(){
        if(session()->has('user_id')){
            return redirect()->route('otp');
        }
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

    public function otp(){
        return view('auth.otp');
    }

    public function otpValidate(Request $request){
        $validated = $request->validate([
            'otp'=> 'required|digits:6'
        ]);

        $user_id = session('user_id');
        $otp = OTP::where('user_id', $user_id)->latest()->first();
        
        if($otp && $validated['otp'] == $otp->otp){
            User::where('id', $user_id)->update(['is_otp_verified'=> true]);
            session()->forget('user_id');
            $otp->delete();
            return redirect()->route('login')->with('success', 'Your OTP has been validated please login');
        }
        return back()->with('error', 'Invalid OTP');
    }


}
