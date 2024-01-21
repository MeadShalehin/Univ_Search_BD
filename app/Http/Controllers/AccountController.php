<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Image;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;


class AccountController extends Controller
{


    public function account_create(Request $request){

        $request->validate([
            'name' => 'required',
            'email' => 'required|string',
            'phone' => 'required|string',            
            'password' => 'required|string', 
            'file' => 'required',   
            'dob' => 'required',   
            'role' => 'required'       
        ]);
    
        
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->dob = $request->dob;
        $user->status = 0;
        $user->password = Hash::make($request->password);
        $user->save();
    
        if($request->hasFile('file')){
            foreach ($request->file('file') as $file) {
                Storage::putFile('public/images/users/',$file);
                $location ='public/images/users/'.$file->hashName();
    
                $image = new Image();
                $image->url = $location;
                $image->type = $file->extension();
                $image->parentable_id = $user->id;
                $image->parentable_type = User::class;
                $image->save();
            }
            
        }   
        
        $user->assignRole($request->role);
        return back()->with('success', 'Account Created Successfully!');   
    }
    

}
