<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Participant extends Model
{
    protected $fillable = ['team1','team2','name','contact','team1_name','team2_name'];
}
