<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('keluarga', function (Blueprint $table) {
    $table->id('keluarga_id');
    $table->string('no_kk')->unique();
    $table->unsignedBigInteger('kepala_keluarga_id')->nullable();
    $table->integer('jumlah_anggota')->default(0);
    $table->string('alamat');
    $table->string('rt')->nullable();
    $table->string('rw')->nullable();
    $table->timestamps();
});

    }

    public function down(): void
    {
        Schema::dropIfExists('keluarga');
    }
};
