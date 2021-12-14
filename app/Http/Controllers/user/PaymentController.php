<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\payment;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function success(Request $request)
    {
        $payment = new payment();
        $payment->description = "Api Success";
        $payment->save();
        return "Success Payment";
    }
}
