<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

   public function up(): void
{
    Schema::create('booking', function (Blueprint $table) {
        $table->id();
        $table->foreignId('user_id')->constrained()->onDelete('cascade');
        $table->foreignId('ruangan_id')->constrained('Ruangan')->onDelete('cascade');
        $table->date('tanggal');
        $table->time('jam');
        $table->integer('durasi');
        $table->string('status')->default('pending');       
        $table->timestamps();
    });
}


    public function down(): void
    {
        Schema::dropIfExists('Booking');
    }
};
