<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use App\Actions\Fortify\PasswordValidationRules;

class ProfileController extends Controller
{
    use PasswordValidationRules;

    function index(){
        $users = User::where('id', auth()->id())->first();
        return view('profile.profile', [
            'users' => $users,
        ]);
    }

    function editProfile(){
        return view('profile.editP');
    }

    function update(Request $request){
        $user = User::find(auth()->id());
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', Rule::unique('users')->ignore($user->id)],
            'bio' => ['max:255'],
            'image' => ['image']
        ]);

        if($request->hasfile('image')){
            if($user->image && Storage::exists('public/avatars/' . $user->image) && $user->image !== 'avatar.png') {
                Storage::delete('public/avatars/' . $user->image);
            }
            $file = $request['image']->getClientOriginalName();
            $image = time()."_".pathinfo($file, PATHINFO_FILENAME) . "." . pathinfo($file, PATHINFO_EXTENSION);
            $user->image = $image;
            Storage::putFileAs('public/avatars/', $request['image'], $image);
        }

        if($user->update(['name' => $request->name, 'email' => $request->email, 'bio' => $request->bio])){
            return redirect()->route('profile-edit')->with('success', 'Profile updated successfully.'); 
        }else{
            return redirect()->route('profile-edit')->with('error', 'Something went wrong.');
        }
    }

    function passwordUpdate(Request $request){
        $user = User::find(auth()->id());

        $request->validate([
            'oldPassword' => ['required', 'string', 'current_password:web'],
            'password' => $this->passwordRules()
        ]);
        
        if($user->update(['password' => Hash::make($request->password)])){
            return redirect()->route('profile-edit')->with('success', 'Password updated successfully.');
        }else{
            return redirect()->route('profile-edit')->with('error', 'Something went wrong.');
        }
    }
}
