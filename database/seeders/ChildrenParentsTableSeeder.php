<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ChildrenParentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('children_parents')->insert([
            [
                'name' => 'Ali Mustofa',
                'birth_place' => 'Bandung',
                'birth_date' => '1990-01-01',
                'marital' => 'Menikah',
                'tertiary_education' => 'S1',
                'job' => 'Pegawai Negeri',
                'salary' => 'Rp. 5.000.000',
                'address' => 'Jl. Jalan',
                'phone' => '081234567890',
                'home_status' => 'Milik Sendiri',
                'number_of_souls' => '5',
                'category_of_souls' => 'Mampu',
            ],
            [
                'name' => 'Budi Santoso',
                'birth_place' => 'Bandung',
                'birth_date' => '1990-01-01',
                'marital' => 'Menikah',
                'tertiary_education' => 'S1',
                'job' => 'Pegawai Negeri',
                'salary' => 'Rp. 5.000.000',
                'address' => 'Jl. Jalan',
                'phone' => '081234567890',
                'home_status' => 'Milik Sendiri',
                'number_of_souls' => '5',
                'category_of_souls' => 'Mampu',
            ]
        ]);
    }
}
