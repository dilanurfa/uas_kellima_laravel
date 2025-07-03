<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('Ruangan', function (Blueprint $table) {
            $table->id(); 
            $table->string('nama_ruangan'); 
            $table->integer('harga'); 
            $table->string('durasi');
            $table->text('deskripsi')->nullable(); 
            $table->string('foto')->nullable(); 
            $table->timestamps(); 
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('Ruangan');
    }
};
