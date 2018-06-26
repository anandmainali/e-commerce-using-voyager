<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends \TCG\Voyager\Models\User
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','avatar'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    
    

    protected $location = '/images/users/March2018/';

    public function getImageAttribute($avatar){
        if($avatar){
        return $this->location.$avatar;
    }
    }

     public  function orders(){
        return $this->hasMany('App\Order');
    }
    
}
