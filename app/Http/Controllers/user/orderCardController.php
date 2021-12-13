<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\cardOrder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class orderCardController extends Controller
{
    public function store(Request $reqeust)
    {
        $validatedData = $reqeust->validate([
            'desg' => 'required|string',
            'heading' => 'required|string',
        ]);
        $task = cardOrder::updateOrCreate([
            'user_id' => Auth::user()->id,
        ], [
            'pricing_id' => 1,
            'card_title' => $validatedData['heading'],
            'card_designation' => $validatedData['desg'],
        ]);
        return response()->json(['success' => 'success'], 200);
    }
}
