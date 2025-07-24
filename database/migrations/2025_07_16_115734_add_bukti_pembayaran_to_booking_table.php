<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up(): void
    {
        Schema::table('booking', function (Blueprint $table) {
            $table->integer('total_harga')->nullable();
            $table->string('bukti_pembayaran')->nullable();
        });
    }

    public function down(): void
    {
        Schema::table('booking', function (Blueprint $table) {
            $table->dropColumn('total_harga');
            $table->dropColumn('bukti_pembayaran');
        });
    }
};
