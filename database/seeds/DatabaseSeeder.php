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
        
        DB::table('permissions')->insert([
            'name' => "admin",
            'statistics' => true,
            'Buildings' => true,
            'Revenues' => true,
            'money' => true,
            'work_stages' =>true,
            'notifications' => true,
            'user_id' => 1
        ]);
        }
          
}
