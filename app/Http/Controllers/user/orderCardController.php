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
        $validatedData = $reqeust->validate([
            'desg' => 'required|string',
            'heading' => 'required|string',
            'about' => 'nullable|string',
        ]);

        $task = cardOrder::updateOrCreate([
            'user_id' => Auth::user()->id,
        ], [
            'pricing_id' => 1,
            'card_title' => $validatedData['heading'],
            'card_designation' => $validatedData['desg'],
            'about' => $validatedData['about'],
        ]);

        // updating the record in profile
        $profile = profile::updateOrCreate(
            [
                'user_id' => Auth::user()->id
            ],
            [
                'title' => $validatedData['heading'],  'designation' => $validatedData['desg'], 'about' => $validatedData['about']
            ]
        );
        return response()->json(['success' => 'success'], 200);
    }
}
