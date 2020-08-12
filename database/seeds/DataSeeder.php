<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class DataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $values = [];
        $content = file_get_contents('http://loripsum.net/api');
        for($i=0; $i<100; $i++) {
            $count = rand(10, 100);
            $count_of_title = rand(1,4);
            $values[$i] = [
                'title' => Str::words(strip_tags($content), $count_of_title),
                'note' => Str::words(strip_tags($content), $count),
                'created_at' => date('Y-m-d', time()),
                'updated_at' => date('Y-m-d', time())
            ];
        }
        DB::table('data')->insert($values);
    }
}
