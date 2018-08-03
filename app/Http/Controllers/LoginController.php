<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\User;
use Auth;

class LoginController extends Controller
{
    //

    public function login()
    {
        return view('login');
    }


    ///login

    public function loginPost(Request $req)
    {
        $user = User::whereEmail($req->input('email'));
        if($user->count() > 0)
        {
           $credentials = $req->only('email','password');
           if(Auth::attempt($credentials))
           {

                   return redirect('/');
           }
           else
           {
            return redirect()->back()->with('error',"Invalid Credentials."); 
           }
        }
        else
        {
            return redirect()->back()->with('error',"Invalid Credentials."); 
        }
    }

    public function logOut()
    {
        Auth::logout();
        Session()->flush();
        return redirect('/login');
    }
}
