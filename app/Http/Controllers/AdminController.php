<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Models\GroupsModel;
use App\Http\Models\Products;
use App\Http\Models\Prices;
use Auth;

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

public function profile()
{
    $user = Auth::user();
    return view('Admin.profile',['page' => 'My Profile','user' => $user]);
}

public function updateProfile(Request $req)
{
    $user = Auth::user();
    $name = $req->input('fullname');
    $email = $req->input('email');
    $user->name = $name;
    $user->email = $email;
    if($user->save())
    {
        return redirect()->back()->with('success','Profile Updated.');
    }
    else
    {
        return redirect()->back()->with('error','Erro occurred in updating the Profile. Try Again.');
    }
}

public function changePassword(Request $req)
{
    $user = Auth::user();
    $currentPassword = $req->input('currentPassword');
    $newPassword = $req->input('newPassword');
    if($currentPassword != "" && $newPassword != ""){
    if(Hash::check($currentPassword,$user->password))
    {
        $user->password = Hash::make($newPassword);
        if($user->save())
        {
            return redirect()->back()->with('success','Password Updated.');
        }
        else
        {
            return redirect()->back()->with('error','Erro occurred in changing the Password. Try Again.');
        }
    }
    else
    {
        return redirect()->back()->with('error','Invalid Current Password.');
    }
}
else
{
    return redirect()->back()->with('error','Password Fields are required.');
}

}

public function groups()
{
    $groups = GroupsModel::all();
    return view('Admin.groups',['page' => 'Groups','groups' => $groups]);
}

public function addgroup(Request $req)
{
    $gname = $req->input('group_name');
    if($gname == "")
    {
    return redirect()->back()->with('error','Group name cannot be empty.');
    }
    else
    {
        $g = new GroupsModel();
        $g->group_name = $gname;
        if($g->save())
        {
            return redirect()->back()->with('success','Group Added.');

        }
        else
        {
    return redirect()->back()->with('error','Error occurred in Adding the group. Please try again.');

        }
    }
}


public function addproduct()
{
    $groups = GroupsModel::all();
    return view('Admin.addproduct',['page' => 'Add Product', 'groups' => $groups]);
}

public function processProduct(Request $req)
{
    $product_code = $req->input('product_code');
    $product_name = $req->input('product_name');
    $product_price = $req->input('product_price');
    $gid = $req->input('group_id');
    $product_note = $req->input('product_note');

    if($product_code == "" || $product_name == "" || $product_price == "" || $gid == "" || $product_note == "")
    {
    return redirect()->back()->with('error','All Fields are required');
        
    }
    else
    {
        $product = new Products();
        $product->product_code = $product_code;
        $product->product_name = $product_name;
        $product->product_price = $product_price;
        $product->product_note = $product_note;
        $product->group_id = $gid;
        $price = new Prices();
        $price->price = $product_price;
        $price->day = date('d');
        $price->month = date('m');
        $price->year = date('Y');
        if($product->save())
        {
        $price->product_id = $product->product_id;
        $price->save();

    return redirect()->back()->with('success','Product Added.');

        }
        else
        {
    return redirect()->back()->with('error','Error occurred in Adding the Product. Please try again.');

        }
    }

}

public function products()
{
    $products = Products::all();
    return view('Admin.products',['page' => 'Products', 'products' => $products]);
}

public function GroupProducts($id)
{
    $products = Products::whereGroup_id($id)->get();
    return view('Admin.products',['page' => 'Products', 'products' => $products]);
}
}
