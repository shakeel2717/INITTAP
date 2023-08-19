<?php

use App\Models\cardOrder;
use App\Models\Option;
use App\Models\Transaction;
use App\Models\payment;
use App\Models\User;
use Illuminate\Support\Facades\Http;
use App\Mail\OrderInvoice;
use Illuminate\Support\Facades\Mail;


function balance($corporate_id)
{
    $in = Transaction::where('corporate_id', $corporate_id)->where('sum', 'in')->sum('amount');
    $out = Transaction::where('corporate_id', $corporate_id)->where('sum', 'out')->sum('amount');
    return $in - $out;
}

function duePayment($corporate_id)
{
    $out = Transaction::where('corporate_id', $corporate_id)->where('type', 'Subscription Charges')->where('sum', 'out')->sum('amount');
    return $out;
}


function totalDeposit($user_id)
{
    return 1000;
}


function totalSpend($user_id)
{
    return 2000;
}


function hook($amount, $type, $referenceId)
{

    $key =  env('HPP_KEY');
    $storeId =  env('HPP_USERID');
    $merchantUid =  env('MERCHANT_UID');
    $hpp_url =  env('HPP_URL');
    $amount =  $amount;
    $mobile_number = ""; //enter your number to test payment
    $datas = new \stdClass();
    $datas->schemaVersion = "1.0";
    $datas->requestId = "586476d0-fdad-11ea-8081-1d2bf4d9c134";
    $datas->timestamp = "1600873154238";
    $datas->channelName = "WEB";
    $datas->serviceName = "HPP_PURCHASE";
    $datas->serviceParams = new \stdClass();
    $datas->serviceParams->merchantUid = $merchantUid;
    $datas->serviceParams->storeId = $storeId;
    $datas->serviceParams->hppKey = $key;
    $datas->serviceParams->paymentMethod = $type;
    $datas->serviceParams->hppSuccessCallbackUrl = env('hppSuccessCallbackUrl');
    $datas->serviceParams->hppFailureCallbackUrl = env('hppFailureCallbackUrl');
    $datas->serviceParams->hppRespDataFormat = "2";
    $datas->serviceParams->payerInfo = new \stdClass();
    $datas->serviceParams->payerInfo->accountNo = $mobile_number;
    $datas->serviceParams->transactionInfo = new \stdClass();
    $datas->serviceParams->transactionInfo->referenceId = $referenceId;
    $datas->serviceParams->transactionInfo->invoiceId = $referenceId;
    $datas->serviceParams->transactionInfo->amount = $amount;
    $datas->serviceParams->transactionInfo->currency = "USD";
    $datas->serviceParams->transactionInfo->description = "Inittap Payment of ".$referenceId;
    $url = $hpp_url;
    //Log::info("Request: ");
    //Log::info(print_r($datas, true));
    $options = array(
        "ssl"=>array(
            "verify_peer"=>false,
            "verify_peer_name"=>false,
        ),
        'http' => array(
            'method'  => 'POST',
            'content' => json_encode($datas),
            'header' =>  "Content-Type: application/json\r\n" .
                "Accept: application/json\r\n"
        )
    );
    $context  = stream_context_create($options);
    try{
        $result = file_get_contents($url, false, $context);
        Log::info("Response.". $result);
        $response = json_decode($result);
    }
    catch(Exception $e){
        Log::info("Exception happened.". $e->getMessage());
        $response = new \stdClass();
        $response->responseCode=400;
        $response->responseMsg = "Your Payment failed, please try again";
    }
    return $response;
}

function apiHook($amount, $type, $referenceId, $mobile)
{

    $key =  env('API_KEY');
    $storeId =  env('API_USERID');
    $merchantUid =  env('API_MERCHANT_UID');
    $hpp_url =  env('PG_URL');
    $amount =  $amount;
    $mobile_number = $mobile; //enter your number to test payment
    $datas = new \stdClass();
    $datas->schemaVersion = "1.0";
    $datas->requestId = "586476d0-fdad-11ea-8081-1d2bf4d9c134";
    $datas->timestamp = "1600873154238";
    $datas->channelName = "WEB";
    $datas->serviceName = "API_PURCHASE";
    $datas->serviceParams = new \stdClass();
    $datas->serviceParams->merchantUid = $merchantUid;
    $datas->serviceParams->apiUserId = $storeId;
    $datas->serviceParams->apiKey = $key;
    $datas->serviceParams->paymentMethod = $type;
    $datas->serviceParams->payerInfo = new \stdClass();
    $datas->serviceParams->payerInfo->accountNo = $mobile_number;
    //$datas->serviceParams->payerInfo->accountPwd = "1212";
    $datas->serviceParams->transactionInfo = new \stdClass();
    $datas->serviceParams->transactionInfo->referenceId = $referenceId;
    $datas->serviceParams->transactionInfo->invoiceId = $referenceId;
    $datas->serviceParams->transactionInfo->amount = $amount;
    $datas->serviceParams->transactionInfo->currency = "USD";
    $datas->serviceParams->transactionInfo->description = "Inittap Payment of ".$referenceId.' For '.$mobile_number;
    $url = $hpp_url;
    Log::info("Request: ");
    Log::info(print_r($datas, true));
    $options = array(
        "ssl"=>array(
            "verify_peer"=>false,
            "verify_peer_name"=>false,
        ),
       
        'http' => array(
            'ignore_errors' => true,
            'method'  => 'POST',
            'content' => json_encode($datas),
            'header' =>  "Content-Type: application/json\r\n" .
                "Accept: application/json\r\n"
        )
    );
    $context  = stream_context_create($options);
    try{
        $result = file_get_contents($url, false, $context);
        Log::info("Response.". $result);
        $response = json_decode($result);
    }
    catch(Exception $e){
        Log::info("Exception happened.". $e->getMessage());
        $response = new \stdClass();
        $response->responseCode=400;
        $response->responseMsg = "Your Payment failed, please try again";
    }
   
    return $response;
}

function apiCommitHook(stdClass $request)
{

    $key =  env('API_KEY');
    $storeId =  env('API_USERID');
    $merchantUid =  env('API_MERCHANT_UID');
    $hpp_url =  env('PG_URL');
    $datas = new \stdClass();
    $datas->schemaVersion = "1.0";
    $datas->requestId = "586476d0-fdad-11ea-8081-1d2bf4d9c134";
    $datas->timestamp = "1600873154238";
    $datas->channelName = "WEB";
    $datas->serviceName = "API_PREAUTHORIZE_COMMIT";
    $datas->serviceParams = new \stdClass();
    $datas->serviceParams->merchantUid = $merchantUid;
    $datas->serviceParams->apiUserId = $storeId;
    $datas->serviceParams->apiKey = $key;
    $datas->serviceParams->referenceId = $request->referenceId;
    $datas->serviceParams->transactionId = $request->$transactionId;
    $datas->serviceParams->description = "Inittap Payment of ".$referenceId;
    $url = $hpp_url;
    Log::info("Request: ");
    Log::info(print_r($datas, true));
    $options = array(
        "ssl"=>array(
            "verify_peer"=>false,
            "verify_peer_name"=>false,
        ),
        'http' => array(
            'method'  => 'POST',
            'content' => json_encode($datas),
            'header' =>  "Content-Type: application/json\r\n" .
                "Accept: application/json\r\n"
        )
    );
    $context  = stream_context_create($options);
    try{
        $result = file_get_contents($url, false, $context);
        Log::info("Response.". $result);
        $response = json_decode($result);
    }
    catch(Exception $e){
        Log::info("Exception happened.". $e->getMessage());
        $response = new \stdClass();
        $response->responseCode=400;
        $response->responseMsg = "Your Payment failed, please try again";
    }
    return $response;
}

function apiSuccess(stdClass $request)
    {
        
        Log::info(print_r($request, true));
        $txAmount = $request->params->txAmount;

        // getting this user payment transaction
        $payment = payment::where('transactionId', $request->params->referenceId)->first();
        if (!$payment) {
            Log::info("Payment Succesfull, but the transaction not found. TransactionId: " . $request->params->referenceId);
        }

        $payment->m_transactionId = $request->params->transactionId;
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
            $transaction->reference = $request->params->transactionId;
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
        //return view('payments.success');
    }
function siteConfig($type)
{
    $config = Option::where('type', $type)->first();
    if ($config) {
        return $config->value;
    } else {
        return null;
    }
}


function transactionId()
{
    $config = Option::where('type', "transactionId")->first();
    if ($config) {
        $config->value += 1;
        $config->save();
        return $config->value;
    } else {
        return null;
    }
}


function referCount($user_id)
{
    $user = User::findOrFail($user_id);
    $sponsors = User::where('refer', $user->username)->get();
    return $sponsors;
}


function referCommission($user_id){
    $in = Transaction::where('user_id', $user_id)->where('type','Refer Commission')->where('sum', 'in')->sum('amount');
    $out = Transaction::where('user_id', $user_id)->where('type','Withdraw Commission')->where('sum', 'out')->sum('amount');
    return $in - $out;
}