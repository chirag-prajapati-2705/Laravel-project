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

USE Auth;

class ProductController extends Controller
{
    const RESZE_IMAGE_WIDTH='200';
    const IMAGE_UPLOAD_PATH='uploads';
    const THUMB_PATH='thumb';

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
            if (Input::hasFile('image'))
            {
                $file = Input::file('image');
                $image_name=  	$this->resize($file,self::RESZE_IMAGE_WIDTH );
                $product_image=New ProductImage();
                $product_image->product_id=$product->id;
                $product_image->image_name=$image_name;
                $product_image->save();
            }
            Session::flash('success', 'Product successfully created!');
            return Redirect('admin/product/show');
        }
    }
    public function edit($product_id,Request $request)
    {
        $product=Product::find($product_id);

        return view('admin.product.edit', compact('product'));
    }
    private function resize($image, $size)
    {
        try
        {
            $imageRealPath 	= 	$image->getRealPath();
            $thumbName 		= 	time().'_'.$image->getClientOriginalName();
            $img = Image::make($imageRealPath)->save(public_path(self::IMAGE_UPLOAD_PATH).'/'.$thumbName);
            $img->resize(intval($size), null, function($constraint) {
                $constraint->aspectRatio();
            });
            $img->save(public_path(self::IMAGE_UPLOAD_PATH.'/'.self::THUMB_PATH).'/'.$thumbName);
            return $thumbName;
        }
        catch(Exception $e)
        {
            return false;
        }
    }
    public function show(){
        $products=Product::paginate(2);
        return view('admin.product.view')->with('products',$products);
    }
    public function update($product_id,Request $request){
        $rules = array(
            'name' => 'required',
            'sku' => 'required',
            'status' => 'required',
        );
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return Redirect::to('admin/product/create')->withInput()->withErrors($validator);
        }else{
            if (Input::hasFile('image'))
            {
                $file = Input::file('image');
                $this->resize($file,self::RESZE_IMAGE_WIDTH );
            }
            $product=Product::find($product_id);
            $product->fill($request->all());
            $product->save();
            Session::flash('success', 'Product successfully updated!');
           return Redirect('admin/product/show');
        }
    }
    public function destroy($product_id){
        $delete_product=Product::destroy($product_id);
        if($delete_product){
            Session::flash('success', 'Product successfully deleted!');
            return Redirect('admin/product/show');
        }
    }
}
