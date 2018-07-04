<?php

namespace App;
use Nicolaslopezj\Searchable\SearchableTrait;
use Illuminate\Database\Eloquent\Model;


class Product extends Model
{
    use SearchableTrait;
    
    protected $fillable = ['category_id','subcategory_id','childcategory_id','name','slug','discount','old_price','new_price','description','featured','image','images','unit','status','user_id'];
    
    protected $searchable = [
        /**
         * Columns and their priority in search results.
         * Columns with higher values are more important.
         * Columns with equal values have equal importance.
         *
         * @var array
         */
        'columns' => [
            'products.name' => 10,
            'products.slug' => 10,
            
        ],
        
    ];


    public function category()
    {
        return $this->belongsTo('App\ProductCategory');
    }

    public function subcategory()
    {
        return $this->belongsTo('App\SubCategory');
    }

    public function childcategory()
    {
        return $this->belongsTo('App\ChildCategory');
    }

    public function wishlist(){
        return $this->hasMany('App\wishList');
    }

    public function order(){
        return $this->belongsTo('App\Order');
    }
    
    public function orderProduct(){
        return $this->hasMany('App\OrderProduct');
    }

    /*public function sub_categories()
    {
        return $this->hasMany('SubCategory');
    }*/



}
