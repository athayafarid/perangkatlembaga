<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('jabatan_lembaga', function (Blueprint $table) {
            $table->id('jabatan_id');
            $table->foreignId('lembaga_id')
                  ->constrained('lembaga_desa', 'lembaga_id')
                  ->onDelete('cascade');
            $table->string('nama_jabatan');
            $table->string('level')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('jabatan_lembaga');
    }
};
