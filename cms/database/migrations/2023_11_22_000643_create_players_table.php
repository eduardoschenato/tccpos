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
        Schema::create('player_positions', function (Blueprint $table) {
            $table->id();
            $table->string('name', 255);
            $table->string('abbreviation', 3);
            $table->timestamps();
        });

        Schema::create('players', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('player_position_id')->nullable();
            $table->string('url_image', 255);
            $table->string('name', 255);
            $table->tinyInteger('active');
            $table->timestamps();
            $table->foreign('player_position_id')->references('id')->on('player_positions')->onUpdate('cascade')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('players', function (Blueprint $table) {
            $table->dropForeign('players_player_position_id_foreign');
        });
        
        Schema::dropIfExists('players');
        Schema::dropIfExists('player_positions');
    }
};
