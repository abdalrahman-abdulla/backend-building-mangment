<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'id'=>44,
            'username' => "abd009",
            'name' => "ali abdulla", 
            'password' => Hash::make('password'),
        ]);
        DB::table('permissions')->insert([
            'name' => "admin",
            'statistics' => true,
            'buildings' => true,
            'revenues' => true,
            'money' => true,
            'work_stages' =>true,
            'notifications' => true,
            'users' => true,
            'user_id' => 44
        ]);
        }
          
}
