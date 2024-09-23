<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class ManageUserController extends Controller
{
    public function index(){
        if(auth()->user()->role != 'admin'){
            abort(401);
        }
        $users = User::where('role', 'user')->get();
        return view('users.index' , compact('users'));
    }

    public function ban(User $user){
        if(auth()->user()->role != 'admin'){
            abort(401); 
        }
        $user->is_banned = !$user->is_banned;
        $user->save();
        return back()->with('success', 'User status updated');
    }


}
