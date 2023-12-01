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
        Schema::create('individual_assesments', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('quiz_id');
            $table->unsignedBigInteger('player_id');
            $table->foreign('player_id')->references('id')->on('players')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('quiz_id')->references('id')->on('quizzes')->onUpdate('cascade')->onDelete('cascade');
            $table->timestamps();
        });

        Schema::create('collective_assesments', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('quiz_id');
            $table->foreign('quiz_id')->references('id')->on('quizzes')->onUpdate('cascade')->onDelete('cascade');
            $table->timestamps();
        });
        
        Schema::create('quiz_answers', function($table) {
            $table->increments('id');
            $table->unsignedBigInteger('quiz_question_id');
            $table->unsignedBigInteger('individual_assesment_id')->nullable();
            $table->unsignedBigInteger('collective_assesment_id')->nullable();
            $table->string('answer', 255);
            $table->timestamps();
            $table->foreign('quiz_question_id')->references('id')->on('quiz_questions')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('individual_assesment_id')->references('id')->on('individual_assesments')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('collective_assesment_id')->references('id')->on('collective_assesments')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('individual_assesments', function (Blueprint $table) {
            $table->dropForeign('individual_assesments_player_id_foreign');
            $table->dropForeign('individual_assesments_quiz_id_foreign');
        });
        
        Schema::table('collective_assesments', function (Blueprint $table) {
            $table->dropForeign('collective_assesments_quiz_id_foreign');
        });
        
        Schema::table('quiz_answers', function (Blueprint $table) {
            $table->dropForeign('quiz_answers_quiz_question_id_foreign');
            $table->dropForeign('quiz_answers_individual_assesment_id_foreign');
            $table->dropForeign('quiz_answers_collective_assesment_id_foreign');
        });

        Schema::dropIfExists('individual_assesments');
        Schema::dropIfExists('collective_assesments');
        Schema::dropIfExists('quiz_answers');
    }
};
