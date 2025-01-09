<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('trabajo_edificios', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_edificio')->constrained('edificios')->onDelete('cascade');
            $table->date('fecha_inicio')->nullable();
            $table->date('fecha_fin')->nullable();
            $table->text('descripcion')->nullable();
            $table->text('material')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('trabajo_edificios');
    }
};
