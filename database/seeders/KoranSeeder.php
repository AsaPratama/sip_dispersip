<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;


class KoranSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create('id_ID');
 
    	for($i = 1; $i <= 50; $i++){
 
    	      // insert data ke table pegawai menggunakan Faker
    		DB::table('korans')->insert([
    			'judul' => $faker->word,
    			'penulis' => $faker->name,
    			'penerbit' => $faker->name,
    			'tahun_terbit' => $faker->numberBetween(1980, 2024),
                'jumlah_halaman' => $faker->numberBetween(80, 200),
                'kondisi' => $faker->randomElement(['Baik', 'Rusak']),
                'rak_id' => $faker->numberBetween(1, 5),
                'jumlah_buku' => $faker->numberBetween(1, 10),
                'jenis_koleksi' => $faker->randomElement(['Naskah Kuno', 'Majalah', 'Buku', 'Koran']),
    		]);
        }
    }
}
