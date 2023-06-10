<?php

namespace Database\Seeders;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            [
                'username' => 'Admin',
                'role_id' => '1',
                'email' => 'admin@admin.com',
                'password' => bcrypt('123'),
                'remember_token' =>Str::random(60)
            ],
            [
                'username' => 'Ismail Marzuki',
                'role_id' => '2',
                'email' => 'koor@koor.com',
                'password' => bcrypt('123'),
                'remember_token' =>Str::random(60)
            ],
            [
                'username' => 'Ahmad Sanusi',
                'role_id' => '2',
                'email' => 'koor2@koor.com',
                'password' => bcrypt('123'),
                'remember_token' =>Str::random(60)
            ],
            [
                'username' => 'Muzakki',
                'role_id' => '2',
                'email' => 'koor3@koor.com',
                'password' => bcrypt('123'),
                'remember_token' =>Str::random(60)
            ],
            [
                'username' => 'Syahrul',
                'role_id' => '3',
                'email' => 'anak@anak.com',
                'password' => bcrypt('123'),
                'remember_token' =>Str::random(60)
            ],
            [
                'username' => 'Rizky',
                'role_id' => '3',
                'email' => 'anak2@anak.com',
                'password' => bcrypt('123'),
                'remember_token' =>Str::random(60)
            ]
        ]);
    }
}
