<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('perangkat_desa', function (Blueprint $table) {
            $table->id('perangkat_id');
            $table->foreignId('warga_id')
                  ->constrained('warga', 'warga_id')
                  ->onDelete('cascade');
            $table->string('jabatan');
            $table->string('nip')->nullable();
            $table->string('kontak')->nullable();
            $table->date('periode_mulai')->nullable();
            $table->date('periode_selesai')->nullable();
            $table->string('foto')->nullable(); // media foto perangkat
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('perangkat_desa');
    }
};
