<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class State extends Model
{
    protected $fillable = ['state' ];
    public function cities(){
        return $this->hasMany('App\Models\City');
    }
}
