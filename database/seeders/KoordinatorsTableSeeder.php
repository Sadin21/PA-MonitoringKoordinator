<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class KoordinatorsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('koordinators')->insert([
            [
                'name' => 'Ismail Marzuki',
                'phone' => '085677886655',
                'address' => 'Keputih, Surabaya',
                'user_id' => 2,
                'photo'=> 'foto 1.jpg'
            ],
            [
                'name' => 'Ahmad Sanusi',
                'phone' => '081256678987',
                'address' => 'Kebonsari, Surabaya',
                'user_id' => 3,
                'photo'=> 'foto 2.jpg'
            ]
        ]);
    }
}
