<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class AnggotaLembagaSeeder extends Seeder
{
    public function run(): void
    {
        $faker = Faker::create('id_ID');

        foreach (range(1, 100) as $i) {
            DB::table('anggota_lembaga')->insert([
                'lembaga_id'   => $faker->numberBetween(1, 100),
                'warga_id'     => $faker->numberBetween(1, 100),
                'jabatan_id'   => $faker->numberBetween(1, 100),
                'tgl_mulai'    => $faker->date('Y-m-d', '2023-01-01'),
                'tgl_selesai'  => $faker->date('Y-m-d'),
            ]);
        }
    }
}
