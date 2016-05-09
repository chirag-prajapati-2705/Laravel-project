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

        // do the validation ----------------------------------
        // validate against the inputs from our form
        $validator = Validator::make($request->all(), $rules);

        // check if the validator failed -----------------------
        if ($validator->fails()) {

            // get the error messages from the validator
            $messages = $validator->messages();

            // redirect our user back to the form with the errors from the validator
        //    return Redirect::to('admin/user/create')->withErrors($validator);
            Session::flash('message', 'My message');

            return Redirect::to('admin/user/create')->withInput()->with('success', 'Group Created Successfully.');

        }
    }

}
