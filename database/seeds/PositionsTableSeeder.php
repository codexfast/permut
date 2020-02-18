<?php

use Illuminate\Database\Seeder;
use App\Models\Position;
use Carbon\Carbon;
class PositionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $positions = ([
            [
                'position' => 'Programador',
                'created_at' =>Carbon:: now()-> format('Y-m-d H:i:s'),
                'updated_at' =>Carbon:: now()-> format('Y-m-d H:i:s'),
            ],
        ]);
        Position::insert($positions);
    }
}