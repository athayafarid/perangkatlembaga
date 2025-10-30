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
            $table->foreignId('rw_id')
                  ->constrained('rw', 'rw_id')
                  ->onDelete('cascade');
            $table->string('nomor_rt');
            $table->foreignId('ketua_rt_warga_id')
                  ->nullable()
                  ->constrained('warga', 'warga_id')
                  ->onDelete('set null');
            $table->string('keterangan')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('rt');
    }
};
