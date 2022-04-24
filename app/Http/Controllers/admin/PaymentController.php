<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\payment;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function index()
    {
        $payments = payment::all();
        return view('admin.dashboard.payment.index', compact('payments'));
    }
}
