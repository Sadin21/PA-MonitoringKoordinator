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
                'name' => 'Admin',
                'role_id' => '1',
                'email' => 'admin@admin.com',
                'password' => bcrypt('123'),
                'remember_token' =>Str::random(60)
            ],
            [
                'name' => 'Ismail Marzuki',
                'role_id' => '2',
                'email' => 'koor@koor.com',
                'password' => bcrypt('123'),
                'remember_token' =>Str::random(60)
            ],
            [
                'name' => 'Ahmad Sanusi',
                'role_id' => '2',
                'email' => 'koor2@koor.com',
                'password' => bcrypt('123'),
                'remember_token' =>Str::random(60)
            ],
            [
                'name' => 'Muzakki',
                'role_id' => '2',
                'email' => 'koor3@koor.com',
                'password' => bcrypt('123'),
                'remember_token' =>Str::random(60)
            ],
            [
                'name' => 'Syahrul',
                'role_id' => '3',
                'email' => 'anak@anak.com',
                'password' => bcrypt('123'),
                'remember_token' =>Str::random(60)
            ],
            [
                'name' => 'Rizky',
                'role_id' => '3',
                'email' => 'anak2@anak.com',
                'password' => bcrypt('123'),
                'remember_token' =>Str::random(60)
            ]
        ]);
    }
}
