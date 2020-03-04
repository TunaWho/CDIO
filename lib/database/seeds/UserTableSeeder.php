<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                'name' => 'haipro',
                'email'=>'anpro2013@gmail.com',
                'password'=>bcrypt('123456789'),
                'level'=> 1
            ],
            [
                'name' => 'Hai-ProDev',
                'email'=>'zhaipro2013@gmail.com',
                'password'=>bcrypt('123456'),
                'level'=> 1
            ]
        ];
        DB::table('vp_users')->insert($data);
    }
}
