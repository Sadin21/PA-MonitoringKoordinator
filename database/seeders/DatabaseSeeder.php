<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(RolesTableSeeder::class);
        $this->call(UsersTableSeeder::class);
        $this->call(KoordinatorsTableSeeder::class);
        // $this->call(ChildrenParentsTableSeeder::class);
        // $this->call(ChildrenTableSeeder::class);
    }
}
