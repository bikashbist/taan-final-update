<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;
class MonthSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $months = [
            ['title' => 'January'],
            ['title' => 'February'],
            ['title' => 'March'],
            ['title' => 'April'],
            ['title' => 'May'],
            ['title' => 'June'],
            ['title' => 'July'],
            ['title' => 'August'],
            ['title' => 'September'],
            ['title' => 'October'],
            ['title' => 'November'],
            ['title' => 'December'],
        ];

        DB::table('months')->insert($months);
    }
}
