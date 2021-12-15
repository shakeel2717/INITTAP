<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\address;
use App\Models\admin;
use App\Models\cardOrder;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        $users = User::get();
        $orders = cardOrder::get();
        $admin = admin::first();
        // getting sum of total orderCards
        $totalOrders = cardOrder::withSum('pricing','price')->get();
        $amount = 0;
        foreach ($totalOrders as $pricing) {
            $amount += $pricing->pricing_sum_price;
        }
        return view('admin.dashboard.index', compact('users', 'orders', 'admin', 'amount','totalOrders'));
    }

    public function users()
    {
        $users = User::get();
        return view('admin.dashboard.users', compact('users'));
    }


    public function userShow($id)
    {
        $user = User::findOrFail($id);
        return view('admin.dashboard.show', compact('user'));
    }


    public function orders()
    {
        // getting all cardOrdres
        $cardOrders = cardOrder::get();
        return view('admin.dashboard.orders', compact('cardOrders'));
    }


    public function oderUpdate($id)
    {
        $validatedData = request()->validate([
            'status' => 'required',
        ]);
        $order = cardOrder::findOrFail($id);
        $order->status = $validatedData['status'];
        $order->save();
        // updating this user status
        $user = auth()->user();
        $user->status = 'active';
        $user->save();
        return redirect()->back()->with('message', 'Order Updated Successfully');
    }

    public function shipping()
    {
        // getting all shipping address
        $addresses = address::get();
        return view('admin.dashboard.shipping', compact('addresses'));
    }
}
