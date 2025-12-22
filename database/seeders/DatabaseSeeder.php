<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Seeder default Laravel
        User::factory()->create([
            'name' => 'farid',
            'email' => 'farid@gmail.com',
            'password'=>'farid123'
        ]);

        // Tambahkan pemanggilan seeder kamu DI BAWAH
        $this->call([
            RwSeeder::class,
            RtSeeder::class,
            PerangkatDesaSeeder::class,
            LembagaDesaSeeder::class,
            JabatanLembagaSeeder::class,
            AnggotaLembagaSeeder::class,
        ]);
    }
}
