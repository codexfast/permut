<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RateSetting extends Model
{
    protected $fillable = ['percent', 'rate_transaction', 'rate_initial', 'max', 'min'];
}
