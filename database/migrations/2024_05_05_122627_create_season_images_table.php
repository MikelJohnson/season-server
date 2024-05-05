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
        Schema::create('season_images', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('season');
            $table->text('image');
            $table->string('mime_type');
            $table->string('filename');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('season_images');
    }
};