<?php

namespace App\Admin;

use App\Model\ProductImage;
use Illuminate\Database\Eloquent\Model;

class Product extends  \Eloquent
{
    //
    protected $table='product';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'sku','price', 'status',
    ];

      public function image() {
        return $this->hasOne(ProductImage::class,'product_id','id'); // this matches the Eloquent model
    }
}
