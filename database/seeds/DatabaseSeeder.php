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
        $this->call(MessagesTableSeeder::class);
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

class MessagesTableSeeder extends Seeder 
{
    public function run()
    {

        $faker = Faker\Factory::create();
        $limit = 33;

         for ($i = 0; $i < $limit; $i++) {
            DB::table('messages')->insert([
                'name' => $faker->name,
                'email' => $faker->email,
                'subject' => $faker->title,
                'text' => $faker->realText($faker->numberBetween(10,20)),
                'ip' => $faker->ipv4
            ]);
        }
    }
}
