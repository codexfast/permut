<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Permut extends Model
{
    protected $fillable = ['requester_id','requested_id','status'];
    public function users(){
        return $this->belongsTo('App\User');
    }
}
