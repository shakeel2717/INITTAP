<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        $users = User::get();
        return view('admin.dashboard.index', compact('users'));
    }

    public function users()
    {
        return view('admin.dashboard.users');
    }
}
