<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;


class RakSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create('id_ID');
 
    	for($i = 1; $i <= 10; $i++){
 
    		DB::table('raks')->insert([
    			'nama_rak' => $faker->randomElement(['A01', 'A02','B01', 'B01']),
                'lokasi_rak' => $faker->randomElement(['Teater', 'Gudang','Pelestarian', 'Ruang Baca']),
    		]);
        }
    }
}
