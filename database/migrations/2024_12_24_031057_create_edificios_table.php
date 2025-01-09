<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('edificios', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_proyecto')->constrained('proyectos')->onDelete('cascade');
            $table->string('nombre_edificio', 255);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('edificios');
    }
};
