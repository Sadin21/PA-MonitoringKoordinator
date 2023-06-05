<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ChildrenTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('children')->insert([
            [
                'name' => 'Syahrul Fadilah',
                'gender' => 'Laki - laki',
                'birth_place' => 'Surabaya',
                'birth_date' => '2010-10-10',
                'status_in_family' => 'Yatim',
                'grade' => 'SD',
                'class' => '4',
                'school' => 'SDN 1 Surabaya',
                'semester' => '2',
                'status_with_parent' => 'Orang Tua',
                'photo' => '1.jpg',
                'regis_status' => 'Pengajuan',
                'city_address' => 'Surabaya',
                'address' => 'Keputih',
                'coordinator_id' => 1,
                'user_id' => 5,
                'parent_id' => '1'
            ],
            [
                'name' => 'Muhammad Rizky',
                'gender' => 'Laki - laki',
                'birth_place' => 'Surabaya',
                'birth_date' => '2010-10-10',
                'status_in_family' => 'Yatim',
                'grade' => 'SD',
                'class' => '4',
                'school' => 'SDN 1 Surabaya',
                'status_with_parent' => 'Orang Tua',
                'photo' => '1.jpg',
                'regis_status' => 'Pengajuan',
                'regis_status' => 'Pengajuan',
                'city_address' => 'Surabaya',
                'coordinator_id' => 2,
                'user_id' => 6,
                'parent_id' => '2'
            ]
        ]);
    }
}
