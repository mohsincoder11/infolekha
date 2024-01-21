<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use DB, Hash;

class AdminLoginController extends Controller
{
    public function login_submit(Request $request)
    {
        if (Auth::guard('admin')->attempt(array('email' => $request->email, 'password' => $request->password))) {
            return redirect()->route('admin.dashboard');
        } else {
            return redirect()->route('admin.login')->with(['error' => 'Please enter valid email address and password.']);
        }
    }

    public function logout()
    {
        Auth::guard('admin')->logout();
        return redirect()->route('admin.login');
    }
}
