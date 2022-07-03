<?php

namespace App\Http\Controllers\corporate;

use App\Http\Controllers\Controller;
use App\Models\corporate\Subscription;
use App\Models\payment;
use App\Models\Transaction;
use Illuminate\Contracts\Support\ValidatedData;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class PaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('corporate.dashboard.payment.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'payment_type' => 'required',
        ]);

        $amount = siteConfig("corporate_subscription_fees");

        $payment = new payment();
        $payment->corporate_id = session('corporate')->id;
        $payment->description = "Due Payment";
        $payment->type = $validatedData['payment_type'];
        $payment->amount = $amount;
        $payment->save();

        // getting pending subscription
        $pendingSubscriptionTransaction = Transaction::where('corporate_id', session('corporate')->id)
            ->where('type', 'Subscription Charges')
            ->where('status', 'pending')
            ->first();

        // checking if sandbox payment is enabled
        if ($validatedData['payment_type'] == 'sandbox' && env('APP_ENV') == 'local') {
            // making a payment for this user
            $transaction = new Transaction();
            $transaction->corporate_id = session('corporate')->id;
            $transaction->type = 'deposit';
            $transaction->sum = 'in';
            $transaction->amount = $amount;
            $transaction->reference = 'SandBox Payment Gateway';
            $transaction->save();

            $expiry_date = now()->addYear();
            // activating this user Subscription
            $subscription = new Subscription();
            $subscription->corporate_id = session('corporate')->id;
            $subscription->type = 'yearly subscription';
            $subscription->status = 'active';
            $subscription->amount = $amount;
            $subscription->expiry_date = $expiry_date;
            $subscription->save();

            $pendingSubscriptionTransaction->status = true;
            $pendingSubscriptionTransaction->save();

            return redirect()->route('corporate.dashboard.index.index')->with('message', 'Sand Box Payment Successful');
        }

        $data = hook($amount, $validatedData['payment_type'], $payment->id);
        return view('payments.init', compact('data'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
