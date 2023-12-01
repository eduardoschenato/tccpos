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
        Schema::create('post_categories', function (Blueprint $table) {
            $table->id();
            $table->string('name', 255);
            $table->tinyInteger('active')->default(1);
            $table->timestamps();
        });
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('post_category_id')->nullable();
            $table->string('title', 255);
            $table->text('summary');
            $table->text('text');
            $table->tinyInteger('active');
            $table->timestamps();
            $table->foreign('post_category_id')->references('id')->on('post_categories')->onUpdate('cascade')->onDelete('set null');
        });
        
        Schema::create('post_images', function($table) {
            $table->increments('id');
            $table->unsignedBigInteger('post_id');
            $table->string('url_image', 255);
            $table->string('type', 1);
            $table->string('subtitle', 255);
            $table->timestamps();
            $table->foreign('post_id')->references('id')->on('posts')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('post_images', function (Blueprint $table) {
            $table->dropForeign('post_images_post_id_foreign');
        });

        Schema::table('posts', function (Blueprint $table) {
            $table->dropForeign('posts_post_category_id_foreign');
        });

        Schema::dropIfExists('post_images');
        Schema::dropIfExists('posts');
        Schema::dropIfExists('post_categories');
    }
};
