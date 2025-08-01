<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

   public function up(): void
{
    Schema::table('booking', function (Blueprint $table) {
        $table->string('metode_bayar')->after('durasi');
    });
}

public function down(): void
{
    Schema::table('booking', function (Blueprint $table) {
        $table->dropColumn('metode_bayar');
    });
}
};
