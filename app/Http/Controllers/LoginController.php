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



    public function loginApp(Request $req)
    {
        $user = User::where(['email' => $req->input('email'), 'isPartner' => 1]);
        $data = array();
        $data['error'] = true;
        $data['isAuthenticated'] = false;
        if($user->count() > 0)
        {
           $credentials = $req->only('email','password');
           if(Auth::attempt($credentials))
           {
                $u = Auth::user();
                   $data['user_id'] = $u->id;
                   $data['name'] = $u->name;
                   $data['email'] = $u->email;
                   $data['group_id'] = $u->group_id;
                   $data['address'] = $u->address;
                   $data['evaluation'] = $u->evaluation;
                   $data['note'] = $u->note;
                   $data['phone'] = $u->phone;
                   $data['error'] = false;
                   $data['isAuthenticated'] = true;
                   return response()->json($data);
           }
           else
           {
            $data['error'] = true;
            $data['isAuthenticated'] = false;
            $data['msg'] = "Invalid Credentials";
            return response()->json($data);
           }
        }
        else
        {
            $data['error'] = true;
            $data['isAuthenticated'] = false;
            $data['msg'] = "Invalid Credentials";
            return response()->json($data);
        }
    }
}
