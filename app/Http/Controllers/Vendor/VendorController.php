<?php

namespace App\Http\Controllers\Vendor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Vendor;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
class VendorController extends Controller
{
    public function register()
    {
        return view('Vendor/register');
    }

    public function login()
    {
        return view('Vendor/vendorlogin');
    }

    public function vregister(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:vendors,email|max:255',
            'mobile' => 'required|string|max:20|unique:vendors,mobile',
            'password' => 'required|string|min:8',
        ]);
        $hashedPassword = Hash::make($validatedData['password']);
        $vendor = new Vendor;
        $vendor->name = $validatedData['name'];
        $vendor->email = $validatedData['email'];
        $vendor->mobile = $validatedData['mobile'];
        $vendor->password = $hashedPassword;
        $vendor->save();

        return redirect()->back()->with('status', 'Vendor Successfully Registered');
    }   
    
    

    public function vendorlogin(Request $request)

    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);
        $vendor = Vendor::where('email', $request->email)->first();
        if ($vendor) {
            if (Hash::check($request->password, $vendor->password)) {
                Auth::guard('vendor')->login($vendor);
                $request->session()->put('id', $vendor->id);
                return redirect()->route('Vendorashboard');
            } else {
                return redirect('vendor')->with('error', 'Email-Address and Password Are Wrong.');
            }
        } else {
            return back()->with('error', 'This Email is Not Registered');
        }
    }
        public function Vendorashboard()
        {
            return view('Vendor.dashboard');
        }

    public function logout()
    {
        Session::flush();
        Auth::logout(); 
        return redirect('vendor');
    }


}
