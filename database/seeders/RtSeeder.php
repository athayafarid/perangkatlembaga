<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class RtSeeder extends Seeder
{
    public function run(): void
    {
        $faker = Faker::create('id_ID');

        foreach (range(1, 100) as $i) {
            DB::table('rt')->insert([
                'rw_id'               => $faker->numberBetween(1, 100),
                'nomor_rt'            => $faker->numberBetween(1, 50),
                'ketua_rt_warga_id'   => $faker->numberBetween(1, 100),
                'keterangan'          => $faker->sentence(),
            ]);
        }
    }
}
