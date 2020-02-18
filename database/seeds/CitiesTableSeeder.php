<?php

use Illuminate\Database\Seeder;
use App\Models\City;
use Carbon\Carbon;
class CitiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $cities = ([
            [
                'city' => 'Novo Cruzeiro',
                'state_id' => '1',
                'created_at' =>Carbon:: now()-> format('Y-m-d H:i:s'),
                'updated_at' =>Carbon:: now()-> format('Y-m-d H:i:s'),
            ],
        ]);
        City::insert($cities);
    }
}