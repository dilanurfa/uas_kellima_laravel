<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('Ruangan', function (Blueprint $table) {
            $table->id(); // primary key
            $table->string('nama_ruangan'); // nama studio atau layanan
            $table->integer('harga'); // harga sewa
            $table->string('durasi'); // durasi sewa (misal: 2 jam)
            $table->text('deskripsi')->nullable(); // deskripsi tambahan
            $table->string('foto')->nullable(); // path atau nama file foto
            $table->timestamps(); // created_at dan updated_at
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('Ruangan');
    }
};
