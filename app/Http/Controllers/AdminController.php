<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Models\GroupsModel;
use App\Http\Models\Products;
use App\Http\Models\Prices;
use App\User;
use Illuminate\Support\Facades\Hash;
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

public function deleteProduct($id)
{
    $p = Products::find($id);
    $price  = Prices::whereProduct_id($id);
    if($p->delete())
    {
        if($price->count() > 0)
        {
            $price->get()->delete();
        }


        return redirect()->back()->with('success','Product Deleted.');

    }
    else
    {
    return redirect()->back()->with('error','Error occurred in deleting the Product. Please try again.');

    }
}

public function product($id)
{
    $product = Products::find($id);
    $groups = GroupsModel::all();
    $prices = Prices::whereProduct_id($id)->get();
    return view('Admin.product',['page' => $product->product_name,'product' => $product,'groups' => $groups,'prices' => $prices]);
}


public function updateProduct(Request $req)
{
    $product_code = $req->input('product_code');
    $product_name = $req->input('product_name');
    $product_price = $req->input('product_price');
    $gid = $req->input('group_id');
    $pid = $req->input('product_id');
    $product_note = $req->input('product_note');

    if($product_code == "" || $product_name == "" || $product_price == "" || $gid == "" || $product_note == "" || $pid == "")
    {
    return redirect()->back()->with('error','All Fields are required');
        
    }
    else
    {
        $product = Products::find($pid);
        $product->product_code = $product_code;
        $product->product_name = $product_name;
        $product->product_price = $product_price;
        $product->product_note = $product_note;
        $product->group_id = $gid;
        if($product->save())
        {
        
            $pricee = Prices::whereProduct_id($pid)->orderBy('pp_id','Desc')->first();
            if($product_price > $pricee->price || $product_price < $pricee->price){
                $price = new Prices();
            $price->price = $product_price;
            $price->day = date('d');
            $price->month = date('m');
            $price->year = date('Y');
        $price->product_id = $product->product_id;
        $price->save();
            }



    return redirect()->back()->with('success','Product Updated.');

        }
        else
        {
    return redirect()->back()->with('error','Error occurred in Updating the Product. Please try again.');

        }
    }

}

public function deleteProductPrice($id)
{
    $price = Prices::find($id);
    if($price->delete())
    {
    return redirect()->back()->with('success','Price Deleted.');

    }
    else
    {
    return redirect()->back()->with('error','Error occurred in Deleting the Price. Please try again.');

    }
}

public function editGroup($id)
{
    $group = GroupsModel::find($id);
    return view('Admin.editGroup',['page' => 'Edit Group: '.$group->group_name,'group' => $group]);
}

public function deleteGroup($id)
{
    $group = GroupsModel::find($id);
    if($group->delete())
    {
    return redirect()->back()->with('success','Group Deleted.');

    }
    else
    {
    return redirect()->back()->with('error','Error occurred in Deleting the Group. Please try again.');

    }
}

public function groupEdit(Request $req)
{
    $gname = $req->input('group_name');
    $gid = $req->input('group_id');
    if($gname == "" || $gid == "")
    {
    return redirect()->back()->with('error','Group name cannot be empty.');
    }
    else
    {
        $g = GroupsModel::find($gid);
        $g->group_name = $gname;
        if($g->save())
        {
            return redirect()->back()->with('success','Group Updated.');

        }
        else
        {
    return redirect()->back()->with('error','Error occurred in Updating the group. Please try again.');

        }
    }
}

public function addUser()
{
    $groups = GroupsModel::all();
    return view('Admin.adduser',['page' => 'Add User', 'groups' => $groups]);
}

public function userAdd(Request $req)
{
    $fullname = $req->input('fullname');
    $email = $req->input('email');
    $password = $req->input('password');
    $gid = $req->input('group_id');
    $address = $req->input('address');
    $phone = $req->input('phone');
    $evaluation = $req->input('evaluation');
    $note = $req->input('note');

    if($fullname == "" || $email == "" || $password == "" || $gid == "" || $address == "" || $phone == "" || $evaluation == "" || $note == "")
    {
    return redirect()->back()->with('error','All Fields are Required.');

    }
    else
    {
        $uf = User::whereEmail($email);
        if($uf->count() > 0)
        {
    return redirect()->back()->with('error','Email is already taken. Please use another one.');

        }
        else {
        $user = new User();
        $user->isPartner = 1;
        $user->group_id = $gid;
        $user->name = $fullname;
        $user->address = $address;
        $user->phone = $phone;
        $user->evaluation = $evaluation;
        $user->note = $note;
        $user->password = Hash::make($password);
        $user->email = $email;
        if($user->save())
        {
            return redirect()->back()->with('success','User/Partner Added.');

        }
        else
        {
            return redirect()->back()->with('error','Error occurred in Adding the user/partner. Please try again.');
        }
    }

    }
}

public function users()
{
    $users = User::where(['isPartner' => 1])->get();
    return view('Admin.users',['page' => 'Users/Partners', 'users' => $users]); 
}

public function deleteUser($id)
{
    $user = User::find($id);
    if($user->delete())
    {
    return redirect()->back()->with('success','User Deleted.');

    }
    else
    {
    return redirect()->back()->with('error','Error occurred in Deleting the User. Please try again.');

    }
}

public function editUser($id)
{
    $user = User::find($id);
    $groups = GroupsModel::all();
    return view('Admin.editUser',['page' => 'Edit User: '.$user->name, 'user' => $user,'groups' => $groups]);
}


public function updateUser(Request $req)
{
    $fullname = $req->input('fullname');
    $email = $req->input('email');
    $password = $req->input('password');
    $gid = $req->input('group_id');
    $address = $req->input('address');
    $phone = $req->input('phone');
    $evaluation = $req->input('evaluation');
    $note = $req->input('note');
    $id = $req->input('id');

    if($fullname == "" || $email == "" || $gid == "" || $address == "" || $phone == "" || $evaluation == "" || $note == "")
    {
    return redirect()->back()->with('error','All Fields are Required.');

    }
    else
    {
        $user= User::find($id);
        if($user->email != $email ){
        $uf = User::whereEmail($email);
        if($uf->count() > 0)
        {
    return redirect()->back()->with('error','Email is already taken. Please use another one.');

        }
    }
        
        $user->group_id = $gid;
        $user->name = $fullname;
        $user->address = $address;
        $user->phone = $phone;
        $user->evaluation = $evaluation;
        $user->note = $note;

        if(!empty($password))
        {
        $user->password = Hash::make($password);
        }


        $user->email = $email;
        if($user->save())
        {
            return redirect()->back()->with('success','User/Partner Updated.');

        }
        else
        {
            return redirect()->back()->with('error','Error occurred in Updating the user/partner. Please try again.');
        }


    }
}
}
