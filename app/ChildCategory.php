<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class ChildCategory extends Model
{
    protected $table = 'child_categories';
     protected $fillable = [
        'product_category_id', 'product_subcategory_id','name','slug'
    ];
    
    public function child(){
        return $this->belongsTo('App\SubCategory');
    }
    
    public function category()
    {
        return $this->belongsTo('App\ProductCategory');
    }

    public function subcategory()
    {
        return $this->belongsTo('App\SubCategory');
    }
}
