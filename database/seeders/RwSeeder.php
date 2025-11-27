<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class RwSeeder extends Seeder
{
    public function run(): void
    {
        $faker = Faker::create('id_ID');

        foreach (range(1, 100) as $i) {
            DB::table('rw')->insert([
                'nomor_rw'            => $faker->numberBetween(1, 30),
                'ketua_rw_warga_id'   => $faker->numberBetween(1, 100),
                'keterangan'          => $faker->sentence(),
            ]);
        }
    }
}
