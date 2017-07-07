<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJobsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jobs', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->integer('number');
            $table->dateTime('expiration_date');
            $table->integer('work_time');
            $table->integer('public');
            $table->string('description');
            $table->string('required');
            $table->string('benefit');
            $table->integer('city_id');
            $table->integer('district_id');
            $table->integer('position_id');
            $table->integer('experience');
            $table->integer('work_type');
            $table->integer('job_type');
            $table->integer('salary');
            $table->integer('gender');
            $table->integer('age');
            $table->integer('company_id');
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
        Schema::dropIfExists('jobs');
    }
}
