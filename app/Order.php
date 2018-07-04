<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = ['user_id','email','name','address','phone','total','shipped'];

    public function user(){
        return $this->belongsTo('App\User');
    }

    public function products(){
        return $this->belongsToMany('App\Product')->withPivot('quantity');
    }
    public function orderProduct(){
        return $this->hasMany('App\OrderProduct');
    }
}
