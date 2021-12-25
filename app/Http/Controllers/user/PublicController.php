<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\email;
use App\Models\phone;
use App\Models\profile;
use App\Models\social;
use App\Models\User;
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
        $validatedData = $request->validate([
            'profile' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if ($request->hasFile('profile')) {
            $file = $request->profile;
            $name = time() . Auth::user()->code . '.' . $file->getClientOriginalExtension();
            $file->move(public_path() . '/assets/profiles/', $name);
            // updating the user profile
            $profile = auth()->user();
            $profile->avatar = $name;
            $profile->save();
        }
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


    public function social(Request $request)
    {
        $validatedData = $request->validate([
            'social' => 'required',
            'link' => 'required',
        ]);
        switch ($validatedData['social']) {
            case 'facebook':
                $icon = 'tio-facebook-square';
                $protocole = 'https://www.facebook.com/';
                break;
            case 'instagram':
                $icon = 'tio-instagram';
                $protocole = 'https://www.instagram.com/';
                break;
            case 'twitter':
                $protocole = 'https://twitter.com/';
                $icon = 'tio-twitter';
                break;
            case 'youtube':
                $protocole = 'https://www.youtube.com/';
                $icon = 'tio-youtube';
                break;
            case 'linkedin':
                $protocole = 'https://www.linkedin.com/';
                $icon = 'tio-linkedin-square';
                break;
            case 'skype':
                $protocole = 'https://www.skype.com/';
                $icon = 'tio-skype';
                break;
            case 'whatsapp':
                $protocole = 'https://api.whatsapp.com/send?phone=';
                $icon = 'tio-whatsapp';
                break;
            case 'github':
                $protocole = 'https://github.com/';
                $icon = 'tio-github';
                break;
            default:
                $protocole = 'https://www.facebook.com/';
                $icon = 'tio-facebook-square';
                break;
        }

        $social = new social();
        $social->user_id = Auth::user()->id;
        $social->name = $validatedData['social'];
        $social->icon = $icon;
        $social->url = $protocole . $validatedData['link'];
        $social->save();
        return redirect()->back()->with('message', 'Your social information has been updated successfully');
    }


    public function addressEdit(Request $request)
    {
        $validatedData = $request->validate([
            'address' => 'required',
            'city' => 'required',
            'country' => 'required',
        ]);
        // updating this user address
        $profile = profile::find(Auth::user()->profile->id);
        $profile->address = $validatedData['address'];
        $profile->city = $validatedData['city'];
        $profile->country = $validatedData['country'];
        $profile->save();
        return redirect()->back()->with('message', 'Your address has been updated successfully');
    }


    public function socialEdit(Request $request)
    {
        $validatedData = $request->validate([
            'social_id' => 'required',
            'link' => 'required',
        ]);
        $social = social::find($validatedData['social_id']);
        $social->url = $validatedData['link'];
        $social->save();
        return redirect()->back()->with('message', 'Your social information has been updated successfully');
    }

    public function emailEdit(Request $request)
    {
        $validatedData = $request->validate([
            'email_id' => 'required',
            'email' => 'required',
        ]);
        $social = email::find($validatedData['email_id']);
        $social->email = $validatedData['email'];
        $social->save();
        return redirect()->back()->with('message', 'Your email information has been updated successfully');
    }


    public function phoneEdit(Request $request)
    {
        $validatedData = $request->validate([
            'phone_id' => 'required',
            'phone' => 'required',
        ]);
        $social = phone::find($validatedData['phone_id']);
        $social->phone = $validatedData['phone'];
        $social->save();
        return redirect()->back()->with('message', 'Your phone information has been updated successfully');
    }


    public function websiteEdit(Request $request)
    {
        $validatedData = $request->validate([
            'website_id' => 'required',
            'website' => 'required',
        ]);
        $social = website::find($validatedData['website_id']);
        $social->website = $validatedData['website'];
        $social->save();
        return redirect()->back()->with('message', 'Your website has been updated successfully');
    }
}
