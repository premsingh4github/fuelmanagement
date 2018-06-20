<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            [
                'name' => 'Admin',
                'email'=>'admin@localhost.com',
                'password'=>bcrypt('password'),

                'type'=>'1',
            ]
            ,[
                'name'=>'User ',
                'email'=>'user@localhost.com',
                'password'=>bcrypt('password'),

                'type'=>'2'
            ]

        ]);
    }
}
