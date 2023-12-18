<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateLessionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('lessions', function (Blueprint $table) {
            $table->string('image_url')->nullable()->change();
            $table->string('video_url')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('lessions', function (Blueprint $table) {
            $table->string('image_url')->nullable(false)->change();
            $table->string('video_url')->nullable(false)->change();
        });
    }
}