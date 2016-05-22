<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;


use App\Http\Requests;
use Redirect;
use App\Http\Controllers\Controller;
use App\User;
use Validator;
use Input;
use DB;
use Session;

USE Auth;


class UserController extends Controller
{
    //
    public function create(){
        return view('admin.user.create');
    }

    public function store(Request $request)
    {
        $rules = array(
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required',
            'confirm_password' => 'required|same:password'
        );
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return Redirect::to('admin/user/create')->withInput()->withErrors($validator);
        }else{
            $user=New User();
            $user->name=$request->name;
            $user->email=$request->email;
            $user->password=\Hash::make($request->password);
            $user->save();
            $this->session()->flash('success','User successfully added!');
            return Redirect()->back();
        }
    }

    public function show(){
        $user=User::paginate(1);
       // dd($user);
        return view('admin.user.view')->with('users',$user);
    }

}
