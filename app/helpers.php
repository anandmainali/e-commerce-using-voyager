<?php
use App\Product;

function productImage($path){
    return $path && file_exists('images/'.$path) ? asset('images/'.$path) : asset('storage/settings/notfound.jpg');
}

function recommendations(){
    return $recommendations = Product::inRandomOrder()->take(30)->where('status',true)->get();   
}