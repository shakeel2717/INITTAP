<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\address;
use App\Models\admin;
use App\Models\cardOrder;
use App\Models\email;
use App\Models\phone;
use App\Models\profile;
use App\Models\social;
use App\Models\User;
use App\Models\website;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

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


    public function allAdmin()
    {
        $admins = admin::get();
        return view('admin.dashboard.allAdmin', compact('admins'));
    }


    public function addAdmin()
    {
        return view('admin.dashboard.addAdmin');
    }

    public function editAdmin($id)
    {
        $admin = admin::find($id);
        return view('admin.dashboard.editAdmin', compact('admin'));
    }

    public function deleteAdmin($id)
    {
        $admin = admin::find($id);
        $admin->delete();
        return redirect()->back()->with('message', 'Admin Deleted Successfully');
    }

    public function adminUpdate(Request $request)
    {
        $validatedData = $request->validate([
            'username' => 'required|max:255',
            'password' => 'required|max:255',
        ]);

        $admin = admin::find($request->admin_id);
        $admin->username = $validatedData['username'];
        $admin->password = Hash::make($validatedData['password']);
        $admin->save();
        return redirect()->back()->with('message', 'Admin Updated Successfully');
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
            'username' => $request->username,
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

    public function userUpdate(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string',
            'email' => 'required|string',
            'address' => 'required|string',
            'city' => 'required|string',
            'zip' => 'nullable|string',
            'country' => 'required|string',
            'designation' => 'required|string',
            'about' => 'required|string',
            'user_id' => 'required|integer',
        ]);
        $userDetail = User::findOrFail($validatedData['user_id']);

        // updating user profile email
        if ($validatedData['email'] != $userDetail->email) {
            $user = User::findOrFail($userDetail->id);
            $user->email = $validatedData['email'];
            $user->save();
        }

        $profile = profile::where('user_id', $userDetail->id)->firstOrFail();
        $profile->title = $validatedData['name'];
        $profile->address = $validatedData['address'];
        $profile->city = $validatedData['city'];
        $profile->zip = $validatedData['zip'];
        $profile->country = $validatedData['country'];
        $profile->designation = $validatedData['designation'];
        $profile->about = $validatedData['about'];
        $profile->save();
        return redirect()->back()->with('message', 'Profile updated successfully');
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


    public function qrDownload($format, $user)
    {
        if (!$format == 'svg' || !$format == 'eps') {
            return redirect()->back()->with('message', 'Invalid Format');
        }
        $user = User::findOrFail($user);
        $qrCode = QrCode::size(250)->format($format)->generate(route('user.public.profile', ['username' => $user->username]));
        // save this qr code to public folder
        $path = public_path('qr/' . $user->username . '.' . $format);
        file_put_contents($path, $qrCode);
        // download this qr code
        return response()->download($path);
    }


    public function userPublicEdit($id)
    {
        $user = User::findOrFail($id);
        return view('admin.dashboard.userPublicEdit', compact('user'));
    }


    public function userPublicStore(Request $request, $id)
    {
        $user = User::findOrFail($id);
        $validatedData = $request->validate([
            'profile' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if ($request->hasFile('profile')) {
            $file = $request->profile;
            $name = time() . $user->code . '.' . $file->getClientOriginalExtension();
            $file->move(public_path() . '/assets/profiles/', $name);
            // updating the user profile
            $profile = $user;
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
                $publicEmail->user_id = $user->id;
                $publicEmail->email = $email;
                $publicEmail->save();
            }
        }
        // inserting new Phones for this user
        foreach ($phones as $phone) {
            if ($phone) {
                // inserting this user email
                $publicPhone = new phone();
                $publicPhone->user_id = $user->id;
                $publicPhone->phone = $phone;
                $publicPhone->save();
            }
        }
        // inserting new Websites for this user
        foreach ($websites as $website) {
            if ($website) {
                // inserting this user email
                $publicWebsite = new website();
                $publicWebsite->user_id = $user->id;
                $publicWebsite->website = $website;
                $publicWebsite->save();
            }
        }

        return redirect()->back()->with('message', 'Your public information has been updated successfully');
    }


    public function userPublicSocial($id, Request $request)
    {
        $validatedData = $request->validate([
            'social' => 'required',
            'link' => 'required',
        ]);
        $user = User::findOrFail($id);
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
                $protocole = 'https://www.linkedin.com/in/';
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
        $social->user_id = $user->id;
        $social->name = $validatedData['social'];
        $social->icon = $icon;
        $social->url = $protocole . $validatedData['link'];
        $social->save();
        return redirect()->back()->with('message', 'Your social information has been updated successfully');
    }
}
