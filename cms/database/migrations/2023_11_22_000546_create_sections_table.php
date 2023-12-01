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
        Schema::create('sections', function (Blueprint $table) {
            $table->id();
            $table->string('type', 255);
            $table->string('title', 255);
            $table->text('text');
            $table->timestamps();
        });

        Schema::create('section_images', function($table) {
            $table->id();
            $table->unsignedBigInteger('section_id');
            $table->string('url_image', 255);
            $table->timestamps();
            $table->foreign('section_id')->references('id')->on('sections')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('section_images', function (Blueprint $table) {
            $table->dropForeign('section_images_section_id_foreign');
        });
        
        Schema::dropIfExists('section_images');
        Schema::dropIfExists('sections');
    }
};
