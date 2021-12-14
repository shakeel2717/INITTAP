<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\address;
use App\Models\pricing;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class PricingController extends Controller
{
    public function index()
    {
        $price = pricing::all();
        return view('user.dashboard.pricing.index', compact('price'));
    }

    public function show($card)
    {
        $card = pricing::find($card);
        return view('user.dashboard.pricing.show', compact('card'));
    }

    public function edit($order)
    {
        $data = hook();
        // return $data->params->hppUrl;
        return view('user.dashboard.pricing.edit', compact('data'));
    }


    
}
