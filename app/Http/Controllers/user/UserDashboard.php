<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\address;
use App\Models\cardOrder;
use Illuminate\Http\Request;

class UserDashboard extends Controller
{
    public function index()
    {
        $cardOrder = cardOrder::where('user_id', auth()->user()->id)->first();
        return view('user.dashboard.index', compact('cardOrder'));
    }
}
