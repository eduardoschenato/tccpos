<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('banners', function (Blueprint $table) {
            $table->id();
            $table->string('url_image', 255);
            $table->string('location', 255);
            $table->string('title', 255);
            $table->string('subtitle', 255);
            $table->string('link', 255);
            $table->tinyInteger('is_external');
            $table->tinyInteger('new_tab');
            $table->tinyInteger('active');
            $table->tinyInteger('featured');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('banners');
    }
};
