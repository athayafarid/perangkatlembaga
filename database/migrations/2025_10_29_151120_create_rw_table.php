<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('rw', function (Blueprint $table) {
            $table->id('rw_id');
            $table->string('nomor_rw')->unique();
            $table->foreignId('ketua_rw_warga_id')
                  ->nullable()
                  ->constrained('warga', 'warga_id')
                  ->onDelete('set null');
            $table->string('keterangan')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('rw');
    }
};
