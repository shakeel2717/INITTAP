<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\cardOrder;
use App\Models\payment;
use App\Models\profile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class PaymentController extends Controller
{
    public function success(Request $request)
    {
        $validatedData = $request->validate([
            'designation' => 'required|string',
            'card_name' => 'required|string',
            'about' => 'nullable|string',
            'type' => 'required|string',
            'custom' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:10240',
        ]);
        Log::info("WebHook Reached.");
        $type = 'inittap';
        $logo = 'inittap';
        // checking if the card type is custom
        if ($validatedData['type'] == 'custom') {
            $type = 'custom';
            $file = $request->custom;
            $name = time() . Auth::user()->code . '.' . $file->getClientOriginalExtension();
            $file->move(public_path() . '/logo', $name);
            $logo = $name;
        }

        $task = cardOrder::updateOrCreate([
            'user_id' => Auth::user()->id,
        ], [
            'pricing_id' => 1,
            'type' => $type,
            'logo' => $logo,
            'card_title' => $validatedData['card_name'],
            'card_designation' => $validatedData['designation'],
            'about' => $validatedData['about'],
        ]);
        Log::info("Card Order Placed or Updated.");



        // updating the record in profile
        $profile = profile::updateOrCreate(
            [
                'user_id' => Auth::user()->id
            ],
            [
                'title' => $validatedData['card_name'],  'designation' => $validatedData['designation'], 'about' => $validatedData['about']
            ]
        );
        Log::info("Profile Updated.");
        // $payment = new payment();
        // $payment->description = "Api Success";
        // $payment->save();
        return view('payments.success');
    }


    public function failed()
    {
        Log::info("WebHook Failed.");
    }
}
