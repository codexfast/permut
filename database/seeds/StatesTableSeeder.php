<?php

use Illuminate\Database\Seeder;
use App\Models\State;
use Carbon\Carbon;
class StatesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $states = ([
            [
                'state' => 'MG - Minais Gerais',
                'created_at' =>Carbon:: now()-> format('Y-m-d H:i:s'),
                'updated_at' =>Carbon:: now()-> format('Y-m-d H:i:s'),
            ],
        ]);
        State::insert($states);
    }
}