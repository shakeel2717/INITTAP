<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\profile;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     *
     * @return \Illuminate\View\View
     */
    public function create($sponsor = "default")
    {
        // checking if this refer is valid
        if ($sponsor != "default") {
            $user = User::where('username', $sponsor)->firstOrFail();
        }

        return view('auth.register', compact("sponsor"));
    }

    /**
     * Handle an incoming registration request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'sponsor' => ['nullable', 'string', 'max:255', 'exists:users,username'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        if (isset($request->sponsor)) {
            $sponsor = $request->sponsor;
        } else {
            $sponsor = "default";
        }

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'username' => $request->username,
            'refer' => $sponsor,
            'mobile' => $request->mobile,
            'password' => Hash::make($request->password),
        ]);

        // creating this user profile public
        $profile = new profile();
        $profile->user_id = $user->id;
        $profile->title = $request->name;
        $profile->save();

        event(new Registered($user));

        Auth::login($user);

        return redirect(RouteServiceProvider::HOME);
    }
}
