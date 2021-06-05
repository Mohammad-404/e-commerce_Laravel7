<?php

namespace App\Http\Controllers\Admin;

use App\Models\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request; 
use App\Http\Requests\LoginRequest; 
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;


class LoginController extends Controller
{
    
    public function getLogin(){
        return view('Admin.auth.login');
    }

    public function postLogin(Admin $Admin,LoginRequest $request){
        //validation in loginrequest
        $remember_me = $request->has('remember') ? true : false; //true save login session user click logout/ false out session dynamic  

        if(auth()->guard('Admin')->attempt(['email' => $request->input('email') , 
                        'password' => $request->input('password')] ,$remember_me)){
        
            // notify()->success('done enter'); //notification

            return redirect()->Route('admin.dashboard');
        }
        return redirect()->back()->with(['error' => 'error information login faild']);
            // notify()->success('error enter'); //notification
        

    }

    // public function save(){
    //     $admin =  new App\Models\Admin();
    //     $admin -> name = 'mohammad';
    //     $admin -> email = 'm.almasri97.me@gmail.com';
    //     $admin -> password = bcrypt('hello12345');
    //     $admin -> save();


    // }

}
