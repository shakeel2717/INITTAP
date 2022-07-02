<?php

namespace App\Http\Controllers\corporate;

use App\Http\Controllers\Controller;
use App\Models\profile;
use App\Models\User;
use Illuminate\Http\Request;

class UserManagerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('corporate.dashboard.users.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('corporate.dashboard.users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'username' => 'required|string|max:255|unique:users',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8',
        ]);

        $user = new User();
        $user->name = $validatedData['name'];
        $user->username = $validatedData['username'];
        $user->email = $validatedData['email'];
        $user->password = bcrypt($validatedData['password']);
        $user->corporate_id = session('corporate')->id;
        $user->save();

        // creating this user profile public
        $profile = new profile();
        $profile->user_id = $user->id;
        $profile->title = $user->name;
        $profile->save();

        return redirect()->route('corporate.dashboard.users.index')->with('message', 'User created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::where('corporate_id', session('corporate')->id)->where('id', $id)->firstOrFail();

        // deleting this user Profile
        $profile = profile::where('user_id', $id)->firstOrFail();
        $profile->delete();

        $user->delete();


        return redirect()->route('corporate.dashboard.users.index')->with('message', 'User deleted successfully');
    }


    public function userDeactivate($user)
    {
        $user = User::where('corporate_id', session('corporate')->id)->where('id', $user)->firstOrFail();
        if ($user->status == 'deactivated') {
            $status = 'active';
        } else {
            $status = 'deactivated';
        }
        $user->status = $status;
        $user->save();

        return redirect()->route('corporate.dashboard.users.index')->with('message', 'User ' . $status . ' successfully');
    }
}
