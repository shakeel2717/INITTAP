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
    public function init(Request $request)
    {
        $validatedData = $request->validate([
            'designation' => 'required|string',
            'card_name' => 'required|string',
            'about' => 'nullable|string',
            'type' => 'required|string',
            'custom' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:10240',
        ]);
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

        $cardOrderAlready = cardOrder::where('user_id', Auth::user()->id)->where('type', $type)->where('status', '!=', 'initiate')->first();
        if ($cardOrderAlready) {
            return redirect()->back()->with('error', 'You have already a card order, Please Contact us for more information');
        }

        $task = cardOrder::updateOrCreate([
            'user_id' => Auth::user()->id,
        ], [
            'pricing_id' => 1,
            'type' => $type,
            'logo' => $logo,
            'status' => 'initiate',
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
        $data = hook();
        return view('payments.init', compact('data'));
    }


    public function failed()
    {
        Log::info("WebHook Failed.");
        return view('payments.failed');
    }

    public function success(Request $request)
    {
        Log::info("WebHook Reached.");
        $payment = new payment();
        $payment->description = "Api Success";
        $payment->callbackurl = $request->callbackurl;
        $payment->hppResultToken = $request->hppResultToken;
        $payment->HRDF = $request->HRDF;
        $payment->save();
        Log::info("Payment Record Saved.");

        // activating this user card order
        $cardOrder = cardOrder::where('user_id', Auth::user()->id)->where('status', 'initiate')->first();
        $cardOrder->status = 'pending';
        $cardOrder->save();
        Log::info("Card Order Activated.");
        return view('payments.success');
    }
}
