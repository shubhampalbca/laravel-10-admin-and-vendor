<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class AdminController extends Controller
{
    public function login()
    {
        return view('Admin/login');
    }

    public function adminlogin(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);
        $admin = Admin::where('email', $request->email)->first();
        if ($admin) {
            if ($request->password === $admin->password) {
                Auth::guard('admin')->login($admin);
                $request->session()->put('id', $admin->id);
                return redirect()->route('Admindashboard');
            } else {
                return redirect('admin')->with('error', 'Email-Address and Password Are Wrong.');
            }
        } else {
            return back()->with('error', 'This Email is Not Registered');
        }
    }
    

    public function Admindashboard()
    {
        return view('Admin.dashboard');
    }
    public function logout()
    {
        Session::flush();
        Auth::logout();
        return redirect('admin');
    }
}
