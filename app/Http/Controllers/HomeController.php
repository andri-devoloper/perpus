<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function Index_Dashboard()
    {
        $user = Auth::user();

        return view('dashboard.pages.dashboard', compact('user'));
    }

    public function Index_Login()
    {
        return view('dashboard.login');
    }

}