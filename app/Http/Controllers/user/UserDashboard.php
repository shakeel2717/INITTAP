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
        // getting all order of this user
        $cardOrder = cardOrder::where('user_id', auth()->user()->id)->first();
        // if ($cardOrder != null) {
        //     $price = $cardOrder->pricing->price;
        //     $payment_type = $cardOrder->payment_type;
        //     $type = $cardOrder->type;
        //     return view('user.dashboard.index', compact('price', 'payment_type','type'));
        // }
        return view('user.dashboard.index', compact('cardOrder'));
    }
}
