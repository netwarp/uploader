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
           'name' => 'test',
            'email' => 'test@test.com',
            'password' => bcrypt('test')
        ]);
    }
}
