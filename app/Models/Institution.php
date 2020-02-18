<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Institution extends Model
{
    protected $fillable = ['name', 'city_id'];
    public function cities(){
        return $this->belongsTo('App\Models\City');
    }
    public function users(){
        return $this->hasMany('App\User');
    }
}
