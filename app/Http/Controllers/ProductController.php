<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Inter\ProductRepositoryInterface;
use App\Repositories\ProductRepository;

class ProductController extends Controller
{
    //
protected $product_repository;
    public function __construct(ProductRepository $product_repository){
        $this->product_repository=$product_repository;
    }
    public function index($slug){
     //   dd($slug);
        $product=$this->product_repository->getById($slug);
        dd($product->id);
        $product_image=$this->product_repository->getImageById($product->id);
     return   view('product.index')->with('product',$product)->with('product_image',$product_image);

    }
}
