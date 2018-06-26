<?php

use Illuminate\Database\Seeder;

class DesignationsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('designations')->insert([
            [
                'id' => '1',
                'name'=> 'Driver',
                'level'=>'6'
            ]
        ]);
    }
}
