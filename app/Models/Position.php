<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Position extends Model
{
    protected $fillable = ['position'];

    public function users(){
        return $this->hasMany('App\User');
    }
}
