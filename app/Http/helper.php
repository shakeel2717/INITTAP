<?php

use App\Models\cardOrder;
use App\Models\Option;
use App\Models\Transaction;
use App\Models\User;
use Illuminate\Support\Facades\Http;


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
    $datas->serviceParams->transactionInfo->invoiceId = "19330545490";
    $datas->serviceParams->transactionInfo->amount = $amount;
    $datas->serviceParams->transactionInfo->currency = "USD";
    $datas->serviceParams->transactionInfo->description = "Test";
    $url = $hpp_url;
    $options = array(
        'http' => array(
            'method'  => 'POST',
            'content' => json_encode($datas),
            'header' =>  "Content-Type: application/json\r\n" .
                "Accept: application/json\r\n"
        )
    );
    $context  = stream_context_create($options);
    $result = file_get_contents($url, false, $context);
    $response = json_decode($result);
    return $response;
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
