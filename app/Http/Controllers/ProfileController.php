<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function edit(){
        return view('profile.edit');
    }

    public function update(Request $request){
        $validated = $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'username' => 'required',
            'phone' => 'required',
            'profile_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        if($request->hasFile('profile_image')){
            $image = $request->file('profile_image'); //imafe lincha request bata
            $name = time().'.'.$image->getClientOriginalExtension(); //image ko unquie name banauncha ani extension ni linauncha    
            $destinationPath = public_path('/images'); //destination path
            $image->move($destinationPath, $name);
            $validated['profile_image'] = '/images/'.$name;
        }
        $user = auth()->user();
        $user->update($validated);
        return redirect()->route('profile.edit')->with('success', 'Profile updated successfully');
    }
}
