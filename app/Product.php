<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Nicolaslopezj\Searchable\SearchableTrait;


class Product extends Model
{
    use SearchableTrait;
    protected $fillable = [
        'name', 'email', 'password','name','new_price','image'
    ];
    /**
     * Searchable rules.
     *
     * @var array
     */
    protected $searchable = [
        /**
         * Columns and their priority in search results.
         * Columns with higher values are more important.
         * Columns with equal values have equal importances.
         *
         * @var array
         */
        'columns' => [
            'products.name' => 10,
            'products.description' => 10,
            //'product_categories.name' => 5,
            /*'sub_categories.name'=>5,*/
            /*'users.email' => 5,
            'posts.title' => 2,
            'posts.body' => 1,*/
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
