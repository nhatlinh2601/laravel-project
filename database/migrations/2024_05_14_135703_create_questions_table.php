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
        Schema::create('questions', function (Blueprint $table) {
            $table->increments("id");
            $table->string("text");
            $table->string("optionA");
            $table->string("optionB");
            $table->string("optionC");
            $table->string("optionD");
            $table->string("correctAnswer");
            $table->integer('test_id')->unsigned();
            $table->timestamps();

            // $table->foreign('test_id')->references('id')->on('tests')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('questions');
    }
};
