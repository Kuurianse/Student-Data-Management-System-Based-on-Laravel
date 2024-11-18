<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;

class MahasiswasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create('id_ID');

        for($i = 0; $i<50; $i++){
            DB::table('mahasiswas')->insert([
                'nama' => $faker->name,
                'nrp' => $faker->numerify('##########'),
                'email' => $faker->email,
                'jurusan' => $faker->randomElement(['Teknik Informatika', 'Sistem Informasi', 'Manajemen', 'Teknik Electro', 'Teknik Sipil']),
            ]);
        }
    }
}
