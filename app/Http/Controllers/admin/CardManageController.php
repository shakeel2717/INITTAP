<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\pricing;
use Illuminate\Http\Request;

class CardManageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pricings = pricing::all();
        return view('admin.dashboard.cards.index',compact('pricings'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.dashboard.cards.create');
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
            'profile' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'title' => 'required|string',
            'type' => 'required|string',
            'price' => 'required|string',
        ]);

        $file = $request->profile;
        $name = time() . '.' . $file->getClientOriginalExtension();
        $file->move(public_path() . '/assets/cards/', $name);
        // updating the user profile
        $pricing = new pricing();
        $pricing->title = $validatedData['title'];
        $pricing->type = $validatedData['type'];
        $pricing->price = $validatedData['price'];
        $pricing->img = $name;
        $pricing->save();
        return redirect()->back()->with('message', 'Card Added Successfully');
    }

    public function cardPause($card)
    {
        $pricing = pricing::find($card);
        $pricing->status = 'inactive';
        $pricing->save();
        return redirect()->back()->with('message', 'Card Paused Successfully');
    }


    public function cardActive($card)
    {
        $pricing = pricing::find($card);
        $pricing->status = 'active';
        $pricing->save();
        return redirect()->back()->with('message', 'Card Paused Successfully');
    }
    
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $pricing = pricing::find($id);
        return view('admin.dashboard.cards.edit',compact('pricing'));
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
