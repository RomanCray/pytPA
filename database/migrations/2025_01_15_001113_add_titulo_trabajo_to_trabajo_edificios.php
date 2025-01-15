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
        Schema::table('trabajo_edificios', function (Blueprint $table) {
            $table->string('titulo_trabajo')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('trabajo_edificios', function (Blueprint $table) {
            $table->dropColumn('titulo_trabajo');
        });
    }
};
