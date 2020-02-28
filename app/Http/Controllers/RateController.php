<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RateSetting;
use DB;


class RateController extends Controller
{
    public function get(){
        $settings = DB::table('rate_settings')->first();
        return response()->json(['message' => "Operação realizada com sucesso.", 'settings' => $settings, 'success' => true]);
    }
}
