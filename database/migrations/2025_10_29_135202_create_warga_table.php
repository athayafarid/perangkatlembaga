<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Jalankan migrasi.
     */
    public function up(): void
    {
        Schema::create('warga', function (Blueprint $table) {
            // Primary key
            $table->id('warga_id');

            // Data pribadi
            $table->string('no_ktp')->unique();
            $table->string('nama');
            $table->enum('jenis_kelamin', ['Laki-laki', 'Perempuan']);
            $table->string('agama');
            $table->string('pekerjaan');

            // Kontak
            $table->string('telp')->nullable();
            $table->string('email')->nullable();

            // Timestamps (created_at dan updated_at)
            $table->timestamps();
        });
    }

    /**
     * Hapus tabel jika rollback.
     */
    public function down(): void
    {
        Schema::dropIfExists('warga');
    }
};
