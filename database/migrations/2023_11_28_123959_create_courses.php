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
        Schema::create('courses', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->integer('price');
            $table->longText('description');
            $table->integer('status');
            $table->foreignId('category_id')->constrained('categories');
            $table->foreignId('level_id')->constrained('levels');
            $table->string('image_url');
            $table->string('video_url');
            $table->string('image_url')->nullable()->change();
            $table->string('video_url')->nullable()->change();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('courses');
    }
};
