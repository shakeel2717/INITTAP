<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Mail\OrderInvoice;
use App\Mail\OrderPlaced;
use App\Models\cardOrder;
use App\Models\payment;
use App\Models\pricing;
use App\Models\profile;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

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
            'order_id' => 'required|integer',
            'payment_type' => 'required|string',
            'mobile' => 'required|string',
        ]);

        $user = User::find(session('user')->id);
        $order = pricing::findOrFail($validatedData['order_id']);
        $type = 'inittap';
        $logo = 'inittap';
        $custom_cost = 0;
        // checking if the card type is custom
        if ($validatedData['type'] == 'custom') {
            $type = 'custom';
            $file = $request->custom;
            $name = time() . $user->username . '.' . $file->getClientOriginalExtension();
            $file->move(public_path() . '/logo', $name);
            $logo = $name;
            $custom_cost = env('CUSTOM_DESIGN_COST');
        }

        $cardOrderAlready = cardOrder::where('user_id', $user->id)->where('type', $type)->where('status', '!=', 'initiate')->first();
        if ($cardOrderAlready) {
            return redirect()->back()->with('error', 'You have already a card order, Please Contact us for more information');
        }

        $task = cardOrder::updateOrCreate([
            'user_id' => $user->id,
        ], [
            'pricing_id' => $validatedData['order_id'],
            'type' => $type,
            'logo' => $logo,
            'payment_type' => $validatedData['payment_type'],
            'mobile' => $validatedData['mobile'],
            'card_title' => $validatedData['card_name'],
            'card_designation' => $validatedData['designation'],
            'about' => $validatedData['about'],
        ]);
        Log::info("Card Order Placed or Updated.");
        // sending Email to this user
        Mail::to($user->email)->send(new OrderPlaced($task));
        // updating the record in profile
        $profile = profile::updateOrCreate(
            [
                'user_id' => $user->id
            ],
            [
                'title' => $validatedData['card_name'],  'designation' => $validatedData['designation'], 'about' => $validatedData['about']
            ]
        );
        Log::info("Profile Updated.");

        if (env('APP_ENV') == 'local' && $validatedData['payment_type'] == 'sandbox') {

            $payment_type = 'sandbox';
            // working offline with sandbox
            Log::info("Sandbox WebHook Reached.");
            $payment = new payment();
            $payment->user_id = auth()->user()->id;
            $payment->description = "Due Payment";
            $payment->type = $validatedData['payment_type'];

            // activating this user card order
            $cardOrder = cardOrder::where('user_id', $user->id)->where('status', 'initiate')->first();
            $payment->amount = $cardOrder->pricing->price;
            $payment->save();
            Log::info("Payment Record Saved.");

            $cardOrder->status = 'pending';
            $cardOrder->save();
            Log::info("Card Order Activated.");
            return view('payments.success');
        } else {
            Log::info("Sandbox Disabled.");

            $payment = new payment();
            $payment->user_id = auth()->user()->id;
            $payment->description = "Due Payment";
            $payment->type = $validatedData['payment_type'];
            $payment->amount = $order->price;
            $payment->save();

            $amount = $order->price + env('SHIPPING_COST') + $custom_cost;
            $data = hook($amount, $validatedData['payment_type'], $payment->id);
            return view('payments.init', compact('data'));
        }
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
        $referenceId = $request->referenceId;

        // activating this user card order
        $cardOrder = cardOrder::find($referenceId);
        if (!$cardOrder) {
            Log::info("Payment Failed, no Item Found in Card Order.");
        }
        $payment->amount = $cardOrder->pricing->price;
        $payment->save();
        Log::info("Payment Record Saved.");

        $cardOrder->status = 'pending';
        $cardOrder->save();
        Log::info("Card Order Activated.");

        // sending Email to this user
        Mail::to(Auth::user()->email)->send(new OrderInvoice($cardOrder));
        return view('payments.success');
    }


    public function attemptPayment(Request $request)
    {
        $cardOrder = cardOrder::where('user_id', auth()->user()->id)->first();
        $custom1_cost = 0;
        if ($cardOrder->type == 'custom') {
            $custom1_cost = env('CUSTOM_DESIGN_COST');
        }
        $amount = $cardOrder->pricing->price + env('SHIPPING_COST') + $custom1_cost;
        $data = hook($amount, $cardOrder->payment_type, $cardOrder->id);
        return view('payments.init', compact('data'));
    }
}
