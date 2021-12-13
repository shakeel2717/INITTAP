<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\pricing;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class PricingController extends Controller
{
    public function index()
    {
        $price = pricing::all();
        $data = hook();
        return view('user.dashboard.pricing.index', compact('price', 'data'));
    }

    public function test()
    {
    }
}
