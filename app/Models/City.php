<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    protected $fillable = ['city', 'state_id'];
    public function states(){
        return $this->belongsTo('App\Models\State');
    }
    public function institutions(){
        return $this->hasMany('App\Models\Institution');
    }
}
