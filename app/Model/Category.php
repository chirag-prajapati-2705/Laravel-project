<?php

namespace App\Model;

class Category extends  \Eloquent
{
    //
    protected $table='category';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'category_name', 'url','description', 'status',
    ];

}
