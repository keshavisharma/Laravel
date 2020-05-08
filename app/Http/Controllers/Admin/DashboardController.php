<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Http\Request;
use App\Model\Registration;
use Session;

class DashboardController extends Controller
{
    public function login()
    {
        return view('admin.pages.login.login');
    }
    public function loginCheck(Request $request)
    {
        $user = Registration::where('email',$request->email)->first();
        // dd($user);
        if($request->email != '' || $request->password != '')
        {
            if($user->email == $request->email && Crypt::decrypt($user->password) == $request->password)
            {
                $request->session()->put('user',$user->email);
                return redirect()->route('admin-dashboard');
            }
            else
            {
                return redirect()->back()->with('alert-danger','Invalid Email or Password!');
            }
        }
        else
        {
            return redirect()->back()->with('alert-danger','Please provide email and password!');
        }
    }
    public function index()
    {
        return view('admin.pages.dashboard.index');
    }
    public function logout()
    {
        Session::forget('user');
        return redirect()->route('admin-login');
    }
}
