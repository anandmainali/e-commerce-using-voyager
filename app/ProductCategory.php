<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class ProductCategory extends Model
{
     public function subcategories()
    {
        return $this->hasMany(SubCategory::class, 'product_category_id');
    }
}
