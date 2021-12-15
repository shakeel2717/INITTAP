<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\email;
use App\Models\phone;
use App\Models\website;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PublicController extends Controller
{
    public function single()
    {
        return view('user.dashboard.public.single');
    }


    public function edit()
    {
        return view('user.dashboard.public.edit');
    }


    public function store(Request $request)
    {
        $emails = $request->only([
            'email', 'email_0', 'email_1', 'email_2', 'email_3', 'email_4', 'email_5', 'email_6', 'email_7', 'email_8', 'email_9', 'email_10',
        ]);

        $phones = $request->only([
            'phone', 'phone_0', 'phone_1', 'phone_2', 'phone_3', 'phone_4', 'phone_5', 'phone_6', 'phone_7', 'phone_8', 'phone_9', 'phone_10',
        ]);

        $websites = $request->only([
            'website', 'website_0', 'website_1', 'website_2', 'website_3', 'website_4', 'website_5', 'website_6', 'website_7', 'website_8', 'website_9', 'website_10',
        ]);


        // inserting new email for this user
        foreach ($emails as $email) {
            if ($email) {
                // inserting this user email
                $publicEmail = new email();
                $publicEmail->user_id = Auth::user()->id;
                $publicEmail->email = $email;
                $publicEmail->save();
            }
        }


        // inserting new Phones for this user
        foreach ($phones as $phone) {
            if ($phone) {
                // inserting this user email
                $publicPhone = new phone();
                $publicPhone->user_id = Auth::user()->id;
                $publicPhone->phone = $phone;
                $publicPhone->save();
            }
        }


        // inserting new Websites for this user
        foreach ($websites as $website) {
            if ($website) {
                // inserting this user email
                $publicWebsite = new website();
                $publicWebsite->user_id = Auth::user()->id;
                $publicWebsite->website = $website;
                $publicWebsite->save();
            }
        }

        return redirect()->back()->with('message', 'Your public information has been updated successfully');
    }
}
