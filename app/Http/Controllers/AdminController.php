<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    //

    public function index()
    {
        return view('Admin.index',['page' => 'Home']);
    }

    public function light()
{
Session()->put('light',1);
Session()->forget('dark');
return redirect()->back();
}


public function dark()
{
    Session()->put('dark',1);
    Session()->forget('light'); 
return redirect()->back();

}
}
