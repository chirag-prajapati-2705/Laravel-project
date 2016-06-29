<?php

namespace App\Admin;

use App\Model\ProductImage;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    //
    protected $table='product';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'sku', 'status',
    ];

    public function image(){
        return $this->hasOne(ProductImage::class);
    }


}
