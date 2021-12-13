<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function index()
    {
        return view('user.dashboard.profile.index');
    }


    public function profileUpdate(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email|max:255',
        ]);
        // updating this user's profile
        $user = auth()->user();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->save();
        return redirect()->back()->with('message', 'Profile Updated Successfully');
    }
    
    
    public function password()
    {
        return view('user.dashboard.profile.password');
    }

    
    public function passwordUpdate(Request $request)
    {
        $validatedData = $request->validate([
            'password' => 'required|confirmed|max:255',
        ]);
        // checking if this user password is valid
        if (Hash::check($validatedData['password'], Auth::user()->password)) {
            $user = auth()->user();
            $user->password = $validatedData['password'];
            $user->save();
        } else {
            return redirect()->back()->with('message', 'Old Password is not correct');
        }
        return redirect()->back()->with('message', 'Account Password Updated Successfully');
    }
}