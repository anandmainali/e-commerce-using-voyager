<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class SubCategory extends Model
{
    public function cat(){
        return $this->belongsTo('App\ProductCategory');
    }
    public function childcategories()
    {
        return $this->hasMany(ChildCategory::class, 'product_subcategory_id');
    }
}
