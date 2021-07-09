<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class DashboardController extends Controller
{
    public function index(){
        return view('Admin.Dashboard');
    }

    // public function logout(Request $request){
    //     Auth::guard('Admin')->logout();
    //     return redirect()->guest(route('get.login.admin'));
    // }

    public function logout( Request $request )
    {
        if(Auth::guard('Admin')->check()) // this means that the admin was logged in.
        {
            Auth::guard('Admin')->logout();
            return redirect()->route('get.login.admin');
        }

        $this->guard()->logout();
        $request->session()->invalidate();

        return $this->loggedOut($request) ?: redirect('/');
    }
}
