<?php

use Illuminate\Database\Seeder;
use App\Models\RateSetting;
use Carbon\Carbon;


class RateTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $sets = [[
            'percent' => true,
            'rate_transaction' => '6.00',
            'rate_initial' => '12.00',
            'max' => '6045.50',
            'min' => '100.00',
            'created_at' =>Carbon:: now()-> format('Y-m-d H:i:s'),
            'updated_at' =>Carbon:: now()-> format('Y-m-d H:i:s'),
        ]];

        RateSetting::insert($sets);

    }
}
