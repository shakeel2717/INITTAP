<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\admin;
use Illuminate\Http\Request;

class StockController extends Controller
{
    public function store(Request $request)
    {
        $validatedData = request()->validate([
            'qty' => 'required',
        ]);
        $admin = admin::first();
        $admin->stock += $validatedData['qty'];
        $admin->save();
        return redirect()->back()->with('message', 'Stock Updated Successfully');
    }
}
