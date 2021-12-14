<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminAuthController extends Controller
{
    public function login()
    {
        return view('admin.auth.login');
    }


    public function loginReq(Request $request)
    {
        $validatedData = $request->validate([
            'username' => 'required|unique:admins,username',
            'password' => 'required',
        ]);
        $admin = admin::first();
        // checking if password is same
        
        if (!$passwrod = Hash::check($validatedData['password'], $admin->password)) {
            return redirect()->back()->withErrors('Invalid Password');
        }
        // prooceed to login admin
        $request->session()->put('admin', $admin);
        return redirect()->route('admin.dashboard.index');
    }

    public function logout(Request $request)
    {
        $request->session()->flush();
        return redirect(route('admin.login'));
    }
}
