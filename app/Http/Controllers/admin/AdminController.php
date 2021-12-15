<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\address;
use App\Models\cardOrder;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        $users = User::get();
        return view('admin.dashboard.index', compact('users'));
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

    public function shipping()
    {
        // getting all shipping address
        $addresses = address::get();
        return view('admin.dashboard.shipping', compact('addresses'));
    }
}
