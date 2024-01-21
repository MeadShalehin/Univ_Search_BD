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

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::with('roles','image')->where('status',1)->orderBy('id', 'DESC')->get();
        return view('adminpanel.users.index', compact('users'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::all();
        return view('adminpanel.users.create',compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $request->validate([
            'name' => 'required',
            'email' => 'required|string',
            'phone' => 'required|string',
            'password' => 'required|string',
            'file' => 'required',
            'role' => 'required'
        ]);


        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->status = 1;
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
        return back()->with('success', 'You have successfully added user!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // return
        $user = User::with('image','roles')->find($id);
        return view('adminpanel.users.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|string',
            'phone' => 'required|string',
        ]);


        $user = User::with('images')->find($id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;

        if(isset($request->password)){
            $user->password = Hash::make($request->password);
        }
        $user->save();

        if($request->hasFile('file')){
            foreach ($user->images as $image) {
                if (File::exists($image->url)) {
                    unlink($image->url);
                }
                $image->delete();
            }

            foreach ($request->file('file') as $file) {


                Storage::putFile('public/storage/images/users/',$file);
                $location ='public/storage/images/users/'.$file->hashName();

                $image = new Image();
                $image->url = $location;
                $image->type = $file->extension();
                $image->parentable_id = $user->id;
                $image->parentable_type = User::class;
                $image->save();
            }

        }

        $user->assignRole($request->role);
        return back()->with('success', 'You have successfully added user!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }


}
