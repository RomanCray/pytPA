<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('settings_edificio', function (Blueprint $table) {
            $table->id();
            $table->string('nombre_configuracion', 100);
            $table->char('tipo_documento', 4);
            $table->string('tipo_fuente', 150);

            $table->integer('t1_size')->nullable()->default(16);
            $table->boolean('t1_negrita')->nullable()->default(true);
            $table->boolean('t1_oblicua')->nullable()->default(true);
            $table->boolean('t1_underline')->nullable()->default(true);
            $table->string('t1_color',50)->nullable()->default('black');

            $table->integer('t2_size')->nullable()->default(16);
            $table->boolean('t2_negrita')->nullable()->default(true);
            $table->boolean('t2_oblicua')->nullable()->default(true);
            $table->boolean('t2_underline')->nullable()->default(true);
            $table->string('t2_color',50)->nullable()->default('black');

            $table->integer('txt_size')->nullable()->default(16);
            $table->boolean('txt_negrita')->nullable()->default(true);
            $table->boolean('txt_oblicua')->nullable()->default(true);
            $table->boolean('txt_underline')->nullable()->default(true);
            $table->string('txt_color',50)->nullable()->default('black');

            $table->boolean('imageBool')->nullable()->default(true);
            $table->boolean('img_size')->nullable()->default(true);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('settings_edificio');
    }
};
