<?php

namespace App\Http\Controllers\corporate;

use App\Http\Controllers\Controller;
use App\Models\address;
use App\Models\cardOrder;
use App\Models\pricing;
use App\Models\profile;
use App\Models\User;
use Illuminate\Http\Request;

class CardBuyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::where('corporate_id', session('corporate')->id)->get();
        $cards = pricing::where('status', true)->get();
        return view('corporate.dashboard.card.index', compact('users', 'cards'));
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
        $validatedData = $request->validate([
            'user_id' => 'required|exists:users,id',
            'pricing_id' => 'required|exists:pricings,id',
            'user_name' => 'required',
            'user_address' => 'required',
            'user_zip' => 'required',
            'user_city' => 'required',
            'country' => 'required',
        ]);

        $user = User::find($validatedData['user_id']);
        session(['user' => $user]);

        // checking if this user already has ordered
        $security = cardOrder::where('user_id', $user->id)->first();
        if ($security != null) {
            return redirect()->back()->withErrors('This user already ordered a card');
        }

        $address = address::updateOrCreate(
            ['user_id' => $user->id],
            [
                'name' => $validatedData['user_name'],
                'address' => $validatedData['user_address'],
                'city' => $validatedData['user_city'],
                'country' => $validatedData['country'],
                'zip' => $validatedData['user_zip'],
            ]
        );

        // updating profile section
        $profile = profile::updateOrCreate(
            [
                'user_id' => $user->id,
            ],
            [
                'title' => $validatedData['user_name'],
                'address' => $validatedData['user_address'],
                'city' => $validatedData['user_city'],
                'country' => $validatedData['country'],
                'zip' => $validatedData['user_zip'],
            ]
        );

        return redirect()->route('corporate.dashboard.cards.show', ['card' => $validatedData['pricing_id']])->with('success', 'Shipping address has been Updated');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $card = pricing::findOrFail($id);
        $user = User::find(session('user')->id);
        return view('corporate.dashboard.card.show', compact('card'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
