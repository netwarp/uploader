<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         $this->call(UsersTableSeeder::class);
    }
}

class UsersTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('users')->insert([
           'name' => 'admin',
            'email' => 'admin@admin.com',
            'password' => bcrypt('admin'),
            'status' => 'admin',
            'description' => 'toto',
            'avatar' => 'toto',
            'ip' => '01'
        ]);
    }
}
