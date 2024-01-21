<?php

namespace App\Http\Controllers;

use App\Models\Otp;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\Hash;

use App\Models\User;

class AdminController extends Controller
{
    function dashboard()
    {
        return view('adminpanel.dashboard.index');
    }

    function account_verify($id)
    {
        $user = User::find($id);
        $user->status = 1;
        $user->save();

        return back()->with('success', 'Account has been approved');
    }
    
    function approval_list(){
        $users = User::with('image','roles')->where('status', 0)->get();
        return view('adminpanel.users.account_approval.index',compact('users'));
    }

    function user_account_view($id)
    {
        $user = User::find($id);
        return view('adminpanel.users.account_approval.view',compact('user'));
    }
  

}
