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
    $table->unsignedBigInteger('warga_id')->nullable();
    $table->string('jabatan');
    $table->string('nip')->nullable();
    $table->string('kontak')->nullable();
    $table->string('periode_mulai')->nullable();
    $table->string('periode_selesai')->nullable();
    $table->text('keterangan')->nullable(); // ✅ TAMBAHAN
    $table->string('foto')->nullable();
    $table->timestamps();
});

    }

    public function down(): void
    {
        Schema::dropIfExists('perangkat_desa');
    }
};
