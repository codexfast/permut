<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    protected $fillable = ['via','status','amount','reference', 'user_id' ];
    public function permuts(){
        return $this->belongsTo('App\Models\Permut');
    }
}
