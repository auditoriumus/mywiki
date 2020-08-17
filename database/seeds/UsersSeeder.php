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
        $users = [
            [
                'name' => 'um_2005',
                'email' => 'um_2005@mail.ru',
                'password' => bcrypt('um_2005@mail.ru'),
            ],
            [
                'name' => 'test',
                'email' => 'test@test.ru',
                'password' => bcrypt('test'),
            ]
        ];
        DB::table('users')->insert($users);
    }
}
