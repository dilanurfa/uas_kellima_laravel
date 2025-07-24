<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

  public function up(): void
{
    Schema::table('booking', function (Blueprint $table) {
        $table->tinyInteger('rating')->nullable(); 
        $table->text('ulasan')->nullable();
    });
}

public function down(): void
{
    Schema::table('booking', function (Blueprint $table) {
        $table->dropColumn(['rating', 'ulasan']);
    });
}

};
