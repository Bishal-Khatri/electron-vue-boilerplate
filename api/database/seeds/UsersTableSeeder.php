<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Bishal Khatri',
            'email' => 'bishal.khatri343@gmail.com',
            'password' => bcrypt('password'),
        ]);
    }
}
