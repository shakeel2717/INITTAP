<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\address;
use App\Models\cardOrder;
use App\Models\profile;
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


    public function addressUpdate(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'address' => 'required|max:255',
            'city' => 'required|max:255',
            'country' => 'required|max:255',
            'zip' => 'required|max:255',
            'order_id' => 'required|integer',
        ]);

        // checking if this user already has ordered
        $security = cardOrder::where('user_id', Auth::user()->id)->first();
        if ($security != null) {
            return redirect()->route('user.dashboard.index')->withErrors('You have already ordered a card');
        }

        $address = address::updateOrCreate(
            ['user_id' => auth()->user()->id],
            [
                'name' => $validatedData['name'],
                'address' => $validatedData['address'],
                'city' => $validatedData['city'],
                'country' => $validatedData['country'],
                'zip' => $validatedData['zip'],
            ]
        );

        // updating profile section
        $profile = profile::updateOrCreate(
            [
                'user_id' => auth()->user()->id,
            ],
            [
                'title' => $validatedData['name'],
                'address' => $validatedData['address'],
                'city' => $validatedData['city'],
                'country' => $validatedData['country'],
                'zip' => $validatedData['zip'],
            ]
        );

        return redirect()->route('user.order.edit', ['order' => $validatedData["order_id"]])->with('message', 'Address Updated Successfully');
    }
}
