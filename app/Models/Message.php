<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    protected $fillable = ['body','status','sender_id','permut_id' ];
    public function permuts(){
        return $this->belongsTo('App\Models\Permut');
    }
}
