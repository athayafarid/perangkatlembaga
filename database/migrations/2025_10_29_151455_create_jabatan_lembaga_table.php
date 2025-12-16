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
    $table->unsignedBigInteger('lembaga_id')->nullable(); // tanpa foreign
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
