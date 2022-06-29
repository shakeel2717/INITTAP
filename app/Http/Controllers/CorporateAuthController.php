<?php

namespace App\Http\Controllers;

use App\Models\Corporate;
use Illuminate\Http\Request;

class CorporateAuthController extends Controller
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
        return view('corporate.auth.register');
    }


    public function login()
    {
        return view('corporate.auth.login');
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
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:corporates',
            'password' => 'required|min:6',
            'document' => 'required|file|mimes:pdf,doc,docx,xls,xlsx,ppt,pptx|max:2048',
            'phone' => 'required|max:255',
            'address' => 'required|max:255',
        ]);

        // storing document in storage

        $document = $request->file('document');
        $documentName = rand(00000, 99999) . $document->getClientOriginalExtension();
        $document->move(public_path('documents'), $documentName);

        $corporate = new Corporate();
        $corporate->name = $validatedData['name'];
        $corporate->email = $validatedData['email'];
        $corporate->password = bcrypt($validatedData['password']);
        $corporate->document = $documentName;
        $corporate->phone = $validatedData['phone'];
        $corporate->address = $validatedData['address'];
        $corporate->save();

        return redirect()->route('corporate.auth.login')->with('message', 'Corporate Account created successfully!');
    }

    public function loginReq(Request $request)
    {
        // validating login request
        $validatedData = $request->validate([
            'email' => 'required|email|max:255',
            'password' => 'required|min:6',
        ]);

        $check = Corporate::where('email', $validatedData['email'])->first();
        if (!$check) {
            return redirect()->route('corporate.auth.login')->withErrors('Invalid Email!');
        }

        if (!password_verify($validatedData['password'], $check->password)) {
            return redirect()->route('corporate.auth.login')->withErrors('Invalid Password!');
        }

        // storing corporate in session
        session()->put('corporate', $check);

        return redirect()->route('corporate.dashboard.index.index');
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
    public function destroy(Request $request)
    {
        $request->session()->forget('corporate');
        return redirect()->route('corporate.auth.login');
    }
}
