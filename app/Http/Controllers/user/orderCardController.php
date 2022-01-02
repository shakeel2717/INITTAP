<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\cardOrder;
use App\Models\profile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class orderCardController extends Controller
{
    public function store(Request $reqeust)
    {
        
        // // checking if this user already has ordered
        // $security = cardOrder::where('user_id', Auth::user()->id)->first();
        // if ($security != "") {
        //     return "already have an Order";
        // }

        return response()->json(['success' => 'success'], 200);
    }
}
