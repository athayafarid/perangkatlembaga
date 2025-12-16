<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
       Schema::create('rt', function (Blueprint $table) {
    $table->id('rt_id');
    $table->unsignedBigInteger('rw_id')->nullable(); // tetap simpan id RW tapi tidak pakai foreign()
    $table->string('nomor_rt');
    $table->unsignedBigInteger('ketua_rt_warga_id')->nullable();
    $table->string('keterangan')->nullable();
    $table->timestamps();
});

    }

    public function down(): void
    {
        Schema::dropIfExists('rt');
    }
};
