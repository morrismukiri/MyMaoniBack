<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePollsTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('polls', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->integer('surveyId')->unsigned();
            $table->integer('categoryId')->unsigned();
            $table->text('description')->nullable();
            $table->dateTime('openTime')->nullable();
            $table->dateTime('closeTime')->nullable();
            $table->integer('targetGroup')->nullable();
            $table->string('type');
            $table->integer('userId');
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
        Schema::drop('polls');
    }
}
