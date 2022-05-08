<?php

use App\Models\cardOrder;
use App\Models\User;
use Illuminate\Support\Facades\Http;

// generate 6 digit unique random number
function userCode()
{
    $randomNumber = rand(100000, 999999);
    $check = User::where('code', $randomNumber)->first();
    if ($check) {
        userCode();
    } else {
        return $randomNumber;
    }
}

function hook($amount,$type)
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
    $datas->serviceParams->hppSuccessCallbackUrl = "https://inittap.com/api/payment/success";
    $datas->serviceParams->hppFailureCallbackUrl = "https://inittap.com/api/payment/failed";
    $datas->serviceParams->payerInfo = new \stdClass();
    $datas->serviceParams->payerInfo->accountNo = $mobile_number;
    $datas->serviceParams->transactionInfo = new \stdClass();
    $datas->serviceParams->transactionInfo->referenceId = rand(1, 1000000);
    $datas->serviceParams->transactionInfo->invoiceId = "19330545490";
    $datas->serviceParams->transactionInfo->amount = $amount;
    $datas->serviceParams->transactionInfo->currency = "USD";
    $datas->serviceParams->transactionInfo->description = "Testing";
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
