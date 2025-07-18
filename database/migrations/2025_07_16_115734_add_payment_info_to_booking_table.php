<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('booking', function (Blueprint $table) {
            //
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('Booking', function (Blueprint $table) {
        $table->integer('total_harga')->nullable();
        $table->string('metode_bayar')->nullable();
        $table->string('bukti_pembayaran')->nullable();
    });

    }
};
