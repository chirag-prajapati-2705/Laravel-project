<?php
/**
 * Created by PhpStorm.
 * User: Akash
 * Date: 6/19/2016
 * Time: 10:18 PM
 */
namespace App\Repositories;

use App\Interfaces\ProductRepositoryInterface;
use App\Admin\Product;
use App\Model\ProductImage;

Class ProductRepository implements ProductRepositoryInterface
{
    public function getById($slug)
    {
        $product = Product::where('sku', $slug)->first();
        return $product;
    }

    public function getImageById($id)
    {
        $product_image = ProductImage::where('product_id', $id)->first();
        return $product_image;
    }
}