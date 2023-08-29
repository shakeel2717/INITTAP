<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Mail\OrderInvoice;
use App\Mail\OrderPlaced;
use App\Models\cardOrder;
use App\Models\Corporate;
use App\Models\payment;
use App\Models\pricing;
use App\Models\profile;
use App\Models\Transaction;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class PaymentController extends Controller
{
    public function init(Request $request)
    {


        // storing this data into database


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

        // checking if this is a corporate user's request, or direct user
        if ($request->session()->exists('corporate')) {
            info("Corporate User");
            $amount = $order->price_corporate;
        } else {
            $amount = $order->price;
        }


        // checking if this request from edahab Gateway
        if ($validatedData['payment_type'] == "edahab") {
            $totalAmount = $amount + env('SHIPPING_COST') + $custom_cost;

            $request_param = array(
                "apiKey" => "yzkdSxQqHlYgvYs4EtnQQGN9sA8FwORlgWNbQOQ92",
                "edahabNumber" => $validatedData['mobile'],
                "amount" => $totalAmount,
                "agentCode" => "083943",
                "returnUrl" => env('eDahabSuccessCallbackUrl')
            );


            $json = json_encode($request_param, JSON_UNESCAPED_SLASHES);

            $hashed = hash('SHA256', $json . "tEmVI8R0oa6gW6VUMIvBEiRFtrCJWA203KkFtF");
            $url = "https://edahab.net/api/api/IssueInvoice?hash=" . $hashed;
            $curl = curl_init($url);
            curl_setopt($curl, CURLOPT_POST, TRUE);
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($curl, CURLOPT_POSTFIELDS, $json);
            curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
            $result = curl_exec($curl);
            $data = json_decode($result);

            // checking if this user already have recent pending payment and delete
            $findDuplicateTid = payment::where('user_id', $user->id)
                ->where('payment_type', 'edahab')
                ->where('status', 'pending')
                ->delete();

            $payment = new payment();
            $payment->user_id = $user->id;
            $payment->responseCode = $data->StatusCode;
            $payment->responseMsg = $data->StatusDescription;
            $payment->type = 'user';
            $payment->payment_type = "edahab";
            $payment->amount = $amount;
            $payment->transactionId = $data->InvoiceId;
            $payment->save();

            return redirect("https://edahab.net/api/payment?invoiceId=" . $data->InvoiceId);
        }

        $transactionId = transactionId();

        $payment = new payment();
        $payment->user_id = $user->id;
        $payment->description = "Card Payment, Paying: ".$validatedData['mobile'];
        $payment->type = 'user';
        $payment->status = 'pending';
        $payment->payment_type = $validatedData['payment_type'];
        $payment->amount = $amount;
        $payment->transactionId = $transactionId;
        $payment->save();

        $amount = $amount + env('SHIPPING_COST') + $custom_cost;
        //info("Amount:" . $amount);
        // $data = hook($amount, $validatedData['payment_type'], $transactionId);
        $data = apiHook($amount, $validatedData['payment_type'], $transactionId, $validatedData['mobile']);
        if ($data->responseCode != 2001) {
            Log::info(print_r($data, true));
            $failureReason = $data->responseMsg;
            $payment->responseMsg = $data->responseMsg;
            $payment->save();
            Log::info("Invalid Status.");
            return view('payments.failed',  compact('failureReason'));
        }
        else{
            Log::info("Response Success: ");
            Log::info(print_r($data, true));
            $api_success = apiSuccess($data);
            return view('payments.success');
        }
        //return view('payments.init', compact('data'));
    }
    
    public function failed(Request $request)
    {
        Log::info("WebHook Failed.". $request);
        $failureReason = $request['procDescription'];
        // dump all the request data
        return view('payments.failed', compact('failureReason'));
    }

    public function success(Request $request)
    {
        Log::info("WebHook Reached.");
        
        if ($request['responseCode'] != 2001) {
            $failureReason = $request['procDescription'];
            Log::info("Invalid Status.");
            return view('payments.failed',  compact('failureReason'));
        }
        Log::info("WebHook Data." . $request);
        $txAmount = $request['txAmount'];

        // getting this user payment transaction
        $payment = payment::where('transactionId', $request['referenceId'])->first();
        if (!$payment) {
            Log::info("Payment Succesfull, but the transaction not found. TransactionId: " . $request['referenceId']);
        }

        $payment->m_transactionId = $request['transactionId'];
        $payment->status = 'complete';
        $payment->save();
        Log::info("Payment Record Saved.");

        // checking if the payment is from corporate
        if ($payment->type == 'corporate') {
            Log::info("Corporate Payment Found.");
            $corporate = Corporate::find($payment->corporate_id);
            $corporate->status = 'active';
            $corporate->save();
            session('corporate')->status = 'active';
            Log::info("Corporate Activated: " . $corporate->email);

            // adding a deposit transaction
            $transaction = new Transaction();
            $transaction->corporate_id = $payment->corporate_id;
            $transaction->amount = $txAmount;
            $transaction->type = "Deposit";
            $transaction->status = true;
            $transaction->sum = "in";
            $transaction->save();
            // getting this user pending subscription
            $transaction = Transaction::where('corporate_id', $payment->corporate_id)->where('type', 'Subscription Charges')->where('status', false)->first();
            $transaction->status = true;
            $transaction->reference = $request['transactionId'];
            $transaction->save();
        }

        // checking if the payment is from user
        if ($payment->type == 'user') {
            Log::info("User Payment Found.");
            $user = User::find($payment->user_id);
            $user->status = 'active';
            $user->save();
            Log::info("User Activated: " . $user->email);
            // adding a deposit transaction
            $transaction = new Transaction();
            $transaction->user_id = $payment->user_id;
            $transaction->amount = $txAmount;
            $transaction->type = "Card Payment";
            $transaction->status = true;
            $transaction->sum = "in";
            $transaction->save();

            //  finding this user card order
            $cardOrder = cardOrder::where('user_id', $payment->user_id)->where('status', 'initiate')->first();
            $cardOrder->status = 'pending';
            $cardOrder->save();
            Log::info("Card Order Activated.");

            // sending Email to this user
            Mail::to(Auth::user()->email)->send(new OrderInvoice($cardOrder));


            // checking if this user has valid refer
            if ($user->refer != "default" && siteConfig("referCommission") > 0) {
                info("Valid Refer Found, Process for the Commission.");
                // getting this refer detail
                $upliner = User::where('username', $user->refer)->first();

                $transaction = new Transaction();
                $transaction->user_id = $upliner->id;
                $transaction->amount = $txAmount * siteConfig("referCommission") / 100;
                $transaction->type = "Refer Commission";
                $transaction->status = true;
                $transaction->sum = "in";
                $transaction->save();
            }
        }


        return view('payments.success');
    }


    public function attemptPayment(Request $request)
    {
        $cardOrder = cardOrder::where('user_id', auth()->user()->id)->first();
        $custom1_cost = 0;
        if ($cardOrder->type == 'custom') {
            $custom1_cost = env('CUSTOM_DESIGN_COST');
        }
        // getting pending Payment who already inserted
        $user = User::find($cardOrder->user_id);
        $pendingPayment = payment::where('user_id', auth()->user()->id)->where('status', 'pending')->latest()->first();
        if ($pendingPayment) {
            $amount = $cardOrder->pricing->price + env('SHIPPING_COST') + $custom1_cost;
            $transactionIdAttempt = transactionId();
            //$tranId =  $transactionIdAttempt;
            $pendingPayment->transactionId = $transactionIdAttempt;
            $pendingPayment->save();
            // $data = hook($amount, $cardOrder->payment_type, $transactionIdAttempt);
            $data = apiHook($amount, $cardOrder->payment_type, $transactionIdAttempt,$cardOrder->mobile);
            if ($data->responseCode != 2001) {
                $failureReason = $data->responseMsg;
                $pendingPayment->responseMsg = $data->responseMsg;
                $pendingPayment->save();
                return view('payments.failed',  compact('failureReason'));
            }
            else{
                //return view('payments.init', compact('data'));
                $api_success = apiSuccess($data);
                return view('payments.success');
            }
        } else {
            $transactionIdAttempt = transactionId();
            $amount = $cardOrder->pricing->price + env('SHIPPING_COST') + $custom1_cost;
            $payment = new payment();
            $payment->user_id = $user->id;
            $payment->description = "Due Payment";
            $payment->type = 'user';
            $payment->payment_type = $cardOrder->payment_type;
            $payment->amount = $cardOrder->pricing->price;
            $payment->transactionId = $transactionIdAttempt;
            $payment->save();
            // $data = hook($amount, $cardOrder->payment_type, $transactionIdAttempt);
            $data = apiHook($amount, $cardOrder->payment_type, $transactionIdAttempt,$cardOrder->mobile);
            if ($data->responseCode != 2001) {
                $failureReason = $data->responseMsg;
                return view('payments.failed',  compact('failureReason'));
            }
            else{
                $api_success = apiSuccess($data);
                return view('payments.success');
            }
            // return view('payments.init', compact('data'));
            //return redirect()->back()->withErrors('You have no pending payment, Please Contact us for more information');
        }
    }


    public function edahab(Request $request)
    {
        info("Edahab WebHook Reached.");

        info("Edahab WebHook Data." . $request);
        info("Getting This User Invoice Id");
        $payment = payment::where('user_id', auth()->user()->id)->where('status', 'pending')->firstOrFail();

        info("Invoice Detail: " . $payment);
        // verifying the invoice status
        $request_param = array("apiKey" => "yzkdSxQqHlYgvYs4EtnQQGN9sA8FwORlgWNbQOQ92", "invoiceId" => $payment->transactionId);
        $json = json_encode($request_param, JSON_UNESCAPED_SLASHES);
        $hashed = hash('SHA256', $json . "tEmVI8R0oa6gW6VUMIvBEiRFtrCJWA203KkFtF");
        $url = "https://edahab.net/api/api/CheckInvoiceStatus?hash=" . $hashed;
        $curl = curl_init($url);
        curl_setopt($curl, CURLOPT_POST, TRUE);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_POSTFIELDS, $json);
        curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
        $result = curl_exec($curl);
        $data = json_decode($result);

        if ($data->InvoiceStatus == "Pending") {
            return redirect()->route('api.failed');
        } elseif ($data->InvoiceStatus == "Paid") {
            $payment->m_transactionId = $data->TransactionId;
            $payment->status = 'complete';
            $payment->save();
            info("Payment Record Saved.");

            // checking if the payment is from corporate
            if ($payment->type == 'corporate') {
                info("Corporate Payment Found.");
                $corporate = Corporate::find($payment->corporate_id);
                $corporate->status = 'active';
                $corporate->save();
                session('corporate')->status = 'active';
                info("Corporate Activated: " . $corporate->email);

                // adding a deposit transaction
                $transaction = new Transaction();
                $transaction->corporate_id = $payment->corporate_id;
                $transaction->amount = $payment->amount;
                $transaction->type = "Deposit";
                $transaction->status = true;
                $transaction->sum = "in";
                $transaction->save();
                // getting this user pending subscription
                $transaction = Transaction::where('corporate_id', $payment->corporate_id)->where('type', 'Subscription Charges')->where('status', false)->first();
                $transaction->status = true;
                $transaction->reference = $data->TransactionId;
                $transaction->save();
            }

            // checking if the payment is from user
            if ($payment->type == 'user') {
                Log::info("User Payment Found.");
                $user = User::find($payment->user_id);
                $user->status = 'active';
                $user->save();
                Log::info("User Activated: " . $user->email);
                // adding a deposit transaction
                $transaction = new Transaction();
                $transaction->user_id = $payment->user_id;
                $transaction->amount = $payment->amount;
                $transaction->type = "Deposit";
                $transaction->status = true;
                $transaction->sum = "in";
                $transaction->save();

                //  finding this user card order
                $cardOrder = cardOrder::where('user_id', $payment->user_id)->where('status', 'initiate')->first();
                $cardOrder->status = 'pending';
                $cardOrder->save();
                Log::info("Card Order Activated.");

                // sending Email to this user
                Mail::to(Auth::user()->email)->send(new OrderInvoice($cardOrder));


                // checking if this user has valid refer
                if ($user->refer != "default" && siteConfig("referCommission") > 0) {
                    info("Valid Refer Found, Process for the Commission.");
                    // getting this refer detail
                    $upliner = User::where('username', $user->refer)->first();

                    $transaction = new Transaction();
                    $transaction->user_id = $upliner->id;
                    $transaction->amount = $payment->amount * siteConfig("referCommission") / 100;
                    $transaction->type = "Refer Commission";
                    $transaction->status = true;
                    $transaction->sum = "in";
                    $transaction->save();
                }
            }

            return view('payments.success');
        } else {
            info("Error#404.");
            return "Error#404, Please Contact Support";
        }
    }
}
