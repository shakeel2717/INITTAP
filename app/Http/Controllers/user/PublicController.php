<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
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
}
