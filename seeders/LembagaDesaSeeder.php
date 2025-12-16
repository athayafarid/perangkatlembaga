<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class LembagaDesaSeeder extends Seeder
{
    public function run(): void
    {
        $faker = Faker::create('id_ID');

        foreach (range(1, 100) as $i) {
            DB::table('lembaga_desa')->insert([
                'nama_lembaga' => $faker->company,
                'deskripsi'    => $faker->sentence(10),
                'kontak'       => $faker->phoneNumber,
            ]);
        }
    }
}
