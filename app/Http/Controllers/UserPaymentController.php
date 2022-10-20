<?php

namespace App\Http\Controllers;

use App\Models\UserPayment;
use Illuminate\Http\Request;

class UserPaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|min:3|max:255',
            'type' => 'required|string|min:3|max:255',
            'account' => 'required|string|min:3|max:255',
            'phone' => 'required|string|min:3|max:255',
        ]);

        // adding or updating this user record
        $address = UserPayment::updateOrCreate(
            ['user_id' => auth()->user()->id],
            [
                'type' => $validated['type'],
                'account' => $validated['account'],
                'title' => $validated['title'],
                'phone' => $validated['phone'],
            ]
        );

        return redirect()->back()->with('message', 'Your Payment Record Updated');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\UserPayment  $userPayment
     * @return \Illuminate\Http\Response
     */
    public function show(UserPayment $userPayment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\UserPayment  $userPayment
     * @return \Illuminate\Http\Response
     */
    public function edit(UserPayment $userPayment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\UserPayment  $userPayment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, UserPayment $userPayment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\UserPayment  $userPayment
     * @return \Illuminate\Http\Response
     */
    public function destroy(UserPayment $userPayment)
    {
        //
    }
}
