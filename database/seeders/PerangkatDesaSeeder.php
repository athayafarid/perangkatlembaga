<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class PerangkatDesaSeeder extends Seeder
{
    public function run(): void
    {
        $faker = Faker::create('id_ID');

        foreach (range(1, 100) as $i) {
            DB::table('perangkat_desa')->insert([
                'warga_id'        => $faker->numberBetween(1, 100),
                'jabatan'         => $faker->randomElement([
                    'Kepala Desa', 'Sekretaris Desa', 'Kaur Umum',
                    'Kaur Keuangan', 'Kasi Pemerintahan', 'Kasi Pelayanan'
                ]),
                'nip'             => $faker->numerify('##################'),
                'kontak'          => $faker->phoneNumber,
                'periode_mulai'   => $faker->date('Y-m-d', '2023-01-01'),
                'periode_selesai' => $faker->date('Y-m-d'),
            ]);
        }
    }
}
