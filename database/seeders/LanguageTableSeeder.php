<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LanguageTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('languages')->insert([
            'name' => 'English',
            'code' => 'en',
            'status' => 1,
            'image' => NULL
        ]);
        DB::table('languages')->insert([
            'name' => 'Nepali',
            'code' => 'np',
            'status' => 1,
            'image' => NULL
        ]);
    }
}
