<?php

namespace Database\Seeders;

use DateTime;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user_list = array(
            array(
                'name' => 'Admin',
                'email' => 'superadmin@gmail.com',
                'mobile' => 9814618803,
                'password' => Hash::make('Softech@123'),
                'role' => 'admin',
                'status' => 'active',
                'email_verified_at' => new DateTime(),
                'created_at' => new DateTime(),
            ),
            array(
                'name' => 'User',
                'email' => 'user@gmail.com',
                'mobile' => 9814618803,
                'password' => Hash::make('password'),
                'role' => 'user',
                'status' => 'active',
                'email_verified_at' => new DateTime(),
                'created_at' => new DateTime(),
            )
        );

        DB::table('users')->insert($user_list);
    }
}
