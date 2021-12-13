<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\address;
use Illuminate\Http\Request;

class UserDashboard extends Controller
{
    public function index()
    {
        // fetching all address detail of this user
        $address = address::where('user_id', auth()->user()->id)->first();
        return view('user.dashboard.index',compact('address')); 
    }
}
