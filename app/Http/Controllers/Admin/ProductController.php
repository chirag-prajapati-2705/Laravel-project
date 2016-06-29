<?php


namespace App\Http\Controllers\Admin;

use App\Admin\Product;
use App\Model\ProductImage;
use Illuminate\Http\Request;


use App\Http\Requests;
use Redirect;
use App\Http\Controllers\Controller;
use App\User;
use Validator;
use Input;
use DB;
use Session;
use Intervention\Image\Facades\Image;
USE App\Service\UploadService;
USE Auth;

class ProductController extends Controller
{

    const RESZE_IMAGE_WIDTH = '200';

    protected $image_service;

    public function __construct(UploadService $image_service)
    {
        $this->image_service = $image_service;
    }

    public function create()
    {
        return view('admin.product.create');
    }

    public function store(Request $request)
    {
        $rules = array(
            'name' => 'required',
            'sku' => 'required',
            'status' => 'required',
            'image' => 'mimes:jpeg,jpg,png,gif|required|max:10000' // max 10000kb
        );
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return Redirect::to('admin/product/create')->withInput()->withErrors($validator);
        } else {
            $product = New Product();
            $product->fill($request->all());
            $product->save();
            if (Input::hasFile('image')) {
                $file = Input::file('image');
                $image_name = $this->image_service->upload($file, self::RESZE_IMAGE_WIDTH, true);
                $product_image = New ProductImage();
                $product_image->product_id = $product->id;
                $product_image->image_name = $image_name;
                $product_image->save();
            }
            Session::flash('success', 'Product successfully created!');
            return Redirect('admin/product/show');
        }
    }

    public function edit($product_id, Request $request)
    {
        $product = Product::find($product_id);
        return view('admin.product.edit', compact('product'));
    }
    public function show()
    {
        $products = Product::all();
        return view('admin.product.view')->with('products', $products);
    }

    public function update($product_id, Request $request)
    {
        $rules = array(
            'name' => 'required',
            'sku' => 'required',
            'status' => 'required',
        );
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return Redirect::to('admin/product/create')->withInput()->withErrors($validator);
        } else {
            $product = Product::find($product_id);
            $product->fill($request->all());
            $product->save();
            if (Input::hasFile('image')) {
                $file = Input::file('image');
                $image_name = $this->resize($file, self::RESZE_IMAGE_WIDTH);
                $product_image = ProductImage::find(Input::get('image_id'));
                $product_image->product_id = $product_id;
                $product_image->image_name = $image_name;
                $product_image->save();
            }
            Session::flash('success', 'Product successfully updated!');
            return Redirect('admin/product/show');
        }
    }

    public function destroy($product_id)
    {
        $delete_product = Product::destroy($product_id);

        if ($delete_product) {
            Session::flash('success', 'Product successfully deleted!');
            return Redirect('admin/product/show');
        }
    }
}
