<?php

use Illuminate\Database\Seeder;
use App\User;
use Carbon\Carbon;
class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = ([
            [
                'name' => 'Admin Permut',
                'email' => 'admin@permut.com.br',
                'city_id'=> '1',
                'position_id'=> '1',
                'institution_id'=> '1',
                'type'=>'1',
                'licensed'=>'1',
                'whatsapp'=>'244927562797',
                'created_at' =>Carbon:: now()-> format('Y-m-d H:i:s'),
                'updated_at' =>Carbon:: now()-> format('Y-m-d H:i:s'),
            ],
            [
                'name' => 'Ravelino de Castro',
                'email' => 'ravelinodecastro@gmail.com',
                'city_id'=> '1',
                'position_id'=> '1',
                'institution_id'=> '1',
                'type'=>'0',
                'licensed'=>'1',
                'whatsapp'=>'244991772789',
                'created_at' =>Carbon:: now()-> format('Y-m-d H:i:s'),
                'updated_at' =>Carbon:: now()-> format('Y-m-d H:i:s'),
            ],
        ]);
        User::insert($users);
    }
}