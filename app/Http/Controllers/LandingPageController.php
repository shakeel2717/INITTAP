<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Models\pricing;
use Illuminate\Http\Request;

class LandingPageController extends Controller
{
    public function index()
    {
        $cards = pricing::where('status','active')->get();
        return view('landing.index', compact('cards'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'subject' => 'required',
            'message' => 'required',
        ]);

        $contact = new Contact();
        $contact->name = $validatedData['name'];
        $contact->email = $validatedData['email'];
        $contact->subject = $validatedData['subject'];
        $contact->message = $validatedData['message'];
        $contact->save();
        return redirect()->back()->with('success', 'Your message has been sent successfully');
    }
}
