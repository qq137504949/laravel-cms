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
        \DB::table('admin')->delete();
        \DB::table('admin')->insert(array (
            0=>[
                'admin_id' => 1,
                'user_name' => 'root',
                'email' => '137504949@qq.com',
                'password'=>bcrypt('sudongxu'),
                'created_at' => '2017-09-25 08:04:57',
                'updated_at' => '2017-09-25 08:48:00',
            ]
        ));
    }
}
