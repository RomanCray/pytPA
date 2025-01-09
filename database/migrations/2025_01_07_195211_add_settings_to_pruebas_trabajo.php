<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('pruebas_trabajo', function (Blueprint $table) {
            $table->string('size_width')->nullable();
            $table->string('size_height')->nullable();
        });
    }

    public function down(): void
    {
        Schema::table('pruebas_trabajo', function (Blueprint $table) {
            $table->dropColumn('size_width');
            $table->dropColumn('size_height');
        });
    }
};
