<?php

namespace App\Http\Controllers;

use App\Models\Feature;
use App\Models\Option;
use App\Models\pricing;
use Illuminate\Http\Request;

class AdminFeatureController extends Controller
{
    public function show($feature)
    {
        // getting all features from pricing table
        $features = Feature::where('pricing_id', $feature)->get();
        return view('admin.dashboard.feature.show', compact('features'));
    }


    public function delete($feature)
    {
        // getting all features from pricing table
        $features = Feature::where('id', $feature)->delete();
        return redirect()->back()->with('message', 'Feature Deleted Successfully');
    }


    public function edit($feature)
    {
        // getting this feature from pricing table
        $feature = Feature::where('id', $feature)->first();
        return view('admin.dashboard.feature.edit', compact('feature'));
    }


    public function update(Request $request)
    {
        $validatedData = $request->validate([
            'feature_id' => 'required',
            'value' => 'required|string',
        ]);

        $feature = Feature::find($validatedData['feature_id']);
        $feature->value = $validatedData['value'];
        $feature->save();
        return redirect()->back()->with('message', 'Feature Updated Successfully');
    }


    public function subscriptionFees(Request $request)
    {
        $validatedData = $request->validate([
            'fees' => 'required|numeric',
        ]);

        $option = Option::where('type','corporate_subscription_fees')->firstOrFail();
        $option->value = $validatedData['fees'];
        $option->save();

        return redirect()->back()->with('message', 'Subscription Fees Updated Successfully');
    }
}
