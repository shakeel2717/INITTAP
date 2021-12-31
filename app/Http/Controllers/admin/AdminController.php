<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\address;
use App\Models\admin;
use App\Models\cardOrder;
use App\Models\profile;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function index()
    {
        $users = User::get();
        $orders = cardOrder::get();
        $admin = admin::first();
        // getting sum of total orderCards
        $totalOrders = cardOrder::withSum('pricing', 'price')->get();
        $amount = 0;
        foreach ($totalOrders as $pricing) {
            $amount += $pricing->pricing_sum_price;
        }
        return view('admin.dashboard.index', compact('users', 'orders', 'admin', 'amount', 'totalOrders'));
    }


    public function addAdmin()
    {
        return view('admin.dashboard.addAdmin');
    }


    public function addUsers()
    {
        return view('admin.dashboard.addUsers');
    }

    public function addAdminReq(Request $request)
    {
        $validatedData = $request->validate([
            'username' => 'required|unique:admins',
            'password' => 'required|min:8',
        ]);
        
        $admin = new admin();
        $admin->username = $request->username;
        $admin->password = Hash::make($request->password);
        $admin->save();
        return redirect()->back()->with('message', 'Admin Added Successfully');
    }

    public function addUsersReq(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'username' => ['required', 'string', 'max:255', 'unique:users'],
            'password' => ['required'],
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'username' => $request->email,
            'code' => userCode(),
            'password' => Hash::make($request->password),
        ]);

        // creating this user profile public
        $profile = new profile();
        $profile->user_id = $user->id;
        $profile->title = $request->name;
        $profile->save();

        event(new Registered($user));
        return redirect()->back()->with('message', 'User added successfully');
    }

    public function userEdit($id)
    {
        $user = User::find($id);
        return view('admin.dashboard.userEdit', compact('user'));
    }


    public function userEditReq(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string',
            'email' => 'required|email',
            'status' => 'required|string',
            'user_id' => 'required|integer',
        ]);
        $user = user::find($validatedData['user_id']);
        $user->name = $validatedData['name'];
        $user->email = $validatedData['email'];
        $user->status = $validatedData['status'];
        $user->save();
        return redirect()->back()->with('message', 'User updated successfully');
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
