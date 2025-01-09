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
            $table->string('edificio_name', 200);
            $table->boolean('status')->nullable()->default(true);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('settings_edificio');
    }
};
