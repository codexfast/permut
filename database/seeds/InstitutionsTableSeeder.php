<?php

use Illuminate\Database\Seeder;
use App\Models\Institution;
use Carbon\Carbon;
class InstitutionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $institutions = ([
            [
                'name' => 'UFMG - Universidade Federal de Minas Gerais',
                'city_id' => '1',
                'created_at' =>Carbon:: now()-> format('Y-m-d H:i:s'),
                'updated_at' =>Carbon:: now()-> format('Y-m-d H:i:s'),
            ],
        ]);
        Institution::insert($institutions);
    }
}