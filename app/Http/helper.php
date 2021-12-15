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

function hook()
{

    $amount =  "79.99"; // pass the amount from your application
    $mobile_number = "252615550008"; //enter your number to test payment
    $datas = new \stdClass();
    $datas->schemaVersion = "1.0";
    $datas->requestId = "586476d0-fdad-11ea-8081-1d2bf4d9c134";
    $datas->timestamp = "1600873154238";
    $datas->channelName = "WEB";
    $datas->serviceName = "HPP_PURCHASE";
    $datas->serviceParams = new \stdClass();
    $datas->serviceParams->merchantUid = "M0912255";
    $datas->serviceParams->storeId = "1000238";
    $datas->serviceParams->hppKey = "HPP-961814494";
    $datas->serviceParams->paymentMethod = "MWALLET_ACCOUNT";
    $datas->serviceParams->payerInfo = new \stdClass();
    $datas->serviceParams->payerInfo->accountNo = $mobile_number;
    $datas->serviceParams->transactionInfo = new \stdClass();
    $datas->serviceParams->transactionInfo->referenceId = rand(1, 1000000);
    $datas->serviceParams->transactionInfo->hppSuccessCallbackUrl = url('api/payment/success');
    $datas->serviceParams->transactionInfo->hppFailureCallbackUrl = route('api.failed');
    $datas->serviceParams->transactionInfo->invoiceId = "1933090";
    $datas->serviceParams->transactionInfo->amount = $amount;
    $datas->serviceParams->transactionInfo->currency = "USD";
    $datas->serviceParams->transactionInfo->description = "Testing";
    $url = 'https://sandbox.waafipay.net/asm';
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
