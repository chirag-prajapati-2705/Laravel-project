<?php


namespace App\Http\Controllers\Admin;

use App\Admin\Product;
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

class ProductController extends Controller
{
    //

    public function create(){
        return view('admin.product.create');
    }

    public function store(Request $request)
    {
        $rules = array(
            'name' => 'required',
            'sku' => 'required',
            'status' => 'required',
        );
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return Redirect::to('admin/product/create')->withInput()->withErrors($validator);
        }else{
            $product=New Product();
            $product->fill($request->all());
            $product->save();
            Session::flash('success', 'Product successfully created!');
            return Redirect()->back();
        }
    }

    public function show(){
        $user=User::paginate(1);
        // dd($user);
        return view('admin.user.view')->with('users',$user);
    }
}
