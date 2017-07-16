<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCurriculumVitaesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('curriculum_vitaes', function(Blueprint $table) {
            $table->increments('id');
            $table->integer('user');
            $table->string('avatar');
            $table->dateTime('birthday');
            $table->tinyInteger('gender');
            $table->string('address');
            $table->integer('city');
            $table->integer('district');
            $table->integer('town');
            $table->string('education');
            $table->string('word_experience');
            $table->string('language');
            $table->string('interests');
            $table->string('references');
            $table->string('qualification');
            $table->string('career_objective');
            $table->string('images');
            $table->tinyInteger('active');
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
        Schema::drop('curriculum_vitaes');
    }
}
