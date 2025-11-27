<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;
use App\Models\Warga;

class KeluargaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Pakai Faker Indonesia
        $faker = Faker::create('id_ID');

        // Ambil seluruh Warga ID
        $wargaIDs = Warga::pluck('warga_id')->toArray();

        // Pastikan ada warga dulu
        if (empty($wargaIDs)) {
            echo "❌ Tidak ada data warga! Jalankan WargaSeeder dulu.\n";
            return;
        }

        // Generate 100 data keluarga
        foreach (range(1, 100) as $i) {
            DB::table('keluarga')->insert([
                'no_kk'              => $faker->numerify('################'), // 16 digit
                'kepala_keluarga_id' => $faker->randomElement($wargaIDs),
                'jumlah_anggota'     => $faker->numberBetween(1, 10),
                'alamat'             => $faker->address,
                'rt'                 => $faker->numberBetween(1, 20),
                'rw'                 => $faker->numberBetween(1, 20),
                'created_at'         => now(),
                'updated_at'         => now(),
            ]);
        }

        echo "✔ Seeder Keluarga selesai — 100 data dibuat.\n";
    }
}
