<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class JabatanLembagaSeeder extends Seeder
{
    public function run(): void
    {
        $faker = Faker::create('id_ID');

        foreach (range(1, 100) as $i) {
            DB::table('jabatan_lembaga')->insert([
                'lembaga_id'    => $faker->numberBetween(1, 100),
                'nama_jabatan'  => $faker->randomElement(['Ketua', 'Wakil Ketua', 'Sekretaris', 'Bendahara', 'Anggota']),
                'level'         => $faker->numberBetween(1, 10),
            ]);
        }
    }
}
