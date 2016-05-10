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
            'name' => 'required',                        // just a normal required validation
            'email' => 'required|email|unique:ducks',     // required and must be unique in the ducks table
            'password' => 'required',
            'confirm_concfirm' => 'required|same:password'           // required and has to match the password field
        );
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return Redirect::to('admin/user/create')->withErrors($validator);
        }
    }

}
