<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
       Schema::create('anggota_lembaga', function (Blueprint $table) {
    $table->id('anggota_id');
    $table->unsignedBigInteger('lembaga_id')->nullable();
    $table->unsignedBigInteger('warga_id')->nullable();
    $table->unsignedBigInteger('jabatan_id')->nullable();
    $table->string('tgl_mulai')->nullable();
    $table->string('tgl_selesai')->nullable();
    $table->timestamps();
});

    }

    public function down(): void
    {
        Schema::dropIfExists('anggota_lembaga');
    }
};
