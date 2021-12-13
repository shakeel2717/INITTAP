<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\address;
use Illuminate\Http\Request;

class UserDashboard extends Controller
{
    public function index()
    {
        return view('user.dashboard.index'); 
    }
}
