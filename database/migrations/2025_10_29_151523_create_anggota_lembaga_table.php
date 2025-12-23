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
            $table->unsignedBigInteger('lembaga_id');
            $table->unsignedBigInteger('warga_id');
            $table->unsignedBigInteger('jabatan_id');

            $table->string('tgl_mulai')->nullable();
            $table->string('tgl_selesai')->nullable();
            $table->text('keterangan')->nullable();

            $table->timestamps();

            $table->foreign('lembaga_id')->references('lembaga_id')->on('lembaga_desa')->cascadeOnDelete();
            $table->foreign('warga_id')->references('warga_id')->on('warga')->cascadeOnDelete();
            $table->foreign('jabatan_id')->references('jabatan_id')->on('jabatan_lembaga')->cascadeOnDelete();
        });

    }

    public function down(): void
    {
        Schema::dropIfExists('anggota_lembaga');
    }
};
