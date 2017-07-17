<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateJobsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jobs', function(Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('number');
            $table->dateTime('expiration_date');
            $table->string('work_time');
            $table->integer('public');
            $table->string('description');
            $table->string('required');
            $table->string('benefit');
            $table->integer('city');
            $table->integer('district');
            $table->string('position');
            $table->string('experience');
            $table->string('work_type');
            $table->string('job_type');
            $table->string('salary');
            $table->integer('gender');
            $table->integer('age');
            $table->integer('company');
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
        Schema::drop('jobs');
    }
}
