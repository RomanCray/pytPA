<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('pruebas_trabajo', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_trabajo_edificio')->constrained('trabajo_edificios')->onDelete('cascade');
            $table->text('foto_url')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('pruebas_trabajo');
    }
};
