<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class ProfileController extends Controller
{
    function index(){
        return view('profile.profile');
    }

    function editProfile(){
        return view('profile.editP');
    }

    function update(Request $request){
        $user = Auth::user();

        $validatedData = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', Rule::unique('users')->ignore($user->id)],
            'bio' => ['max:255'],
        ]);

        $user->name = $validatedData['name'];
        $user->email = $validatedData['email'];
        $user->bio = $validatedData['bio'];
        
        if($user->save()){
            return redirect()->route('profile-edit')->with('success', 'Profile updated successfully.'); 
        }else{
            return redirect()->route('profile-edit')->with('error', 'Something went wrong.');
        }
    }
}
