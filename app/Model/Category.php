<?php

namespace App\Model;

class Category extends  \Eloquent
{
    //
    protected $table='category';
    protected $guarded = ['id'];
    protected $primaryKey = 'category_id';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'category_name', 'url','description', 'status',
    ];


    public function parent()
    {
        return $this->belongsTo(Category::class, 'parent_id');
    }

    public function children()
    {
        return $this->hasMany(Category::class, 'parent_id');
    }

}
