<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'um_2005',
            'email' => 'um_2005@mail.ru',
            'password' => bcrypt('Qq12345678'),
        ]);
    }
}
