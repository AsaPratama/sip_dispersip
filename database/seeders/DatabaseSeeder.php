<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
       // $this->call(KoranSeeder::class);
        $this->call(UserSeeder::class);
       // $this->call(RakSeeder::class);

    }
}
