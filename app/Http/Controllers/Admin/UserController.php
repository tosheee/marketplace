<?php

namespace App\Http\Controllers\Admin;

use App\User;
use App\Role;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index()
    {
        $users = User::all();

        return view('admin.users.index')->with('users', $users)->with('title', 'All users');
    }

    public function create()
    {
        $users = User::all();

        return view('admin.users.create')->with('users', $users)->with('title', 'Create user');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name'     => 'required',
            'email'    => 'required',
            'password' => 'required',
        ]);

        $user =  new User();
        $user->name     = $request->input('name');
        $user->email    = $request->input('email');
        $user->password = bcrypt($request->input('password'));
        $user->save();

        if ($request['role_user']){
            $user->roles()->attach(Role::where('name', 'User')->first());
        }
        if ($request['role_buyer']){
            $user->roles()->attach(Role::where('name', 'Buyer')->first());
        }
        if ($request['role_seller']){
            $user->roles()->attach(Role::where('name', 'Seller')->first());
        }

        return redirect('admin/users')->with('success', 'The user is created');
    }

    public function show($id)
    {
        $user = User::find($id);

        return view('admin.users.show')->with('user', $user)->with('title', 'View user');
    }

    public function edit($id)
    {
        $user = User::find($id);

        return view('admin.users.edit')->with('user', $user)->with('title', 'Edit user');
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name'    => 'required',
            'email'   => 'required',
            'password'=> 'required',
        ]);

        $user =  User::find($id);
        $user->name = $request->input('name');
        $user->email        = $request->input('email');
        $user->password  = $request->input('password');
        $user->save();

        $user->roles()->detach();
        if($request['role_user']){
            $user->roles()->attach(Role::where('name', 'User')->first());
        }
        if($request['role_buyer']){
            $user->roles()->attach(Role::where('name', 'Buyer')->first());
        }
        if($request['role_seller']){
            $user->roles()->attach(Role::where('name', 'Seller')->first());
        }

        return redirect('admin/users')->with('success', 'The user is updated');
    }

    public function destroy($id)
    {
        $user =  User::find($id);
        $user->delete();

        return redirect('admin/users')->with('success', 'The user is deleted');
    }
}
