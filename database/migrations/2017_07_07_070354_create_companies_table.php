<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCompaniesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('companies', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('sub_name');
            $table->string('tax_number');
            $table->string('sologan');

            $table->integer('size');
            $table->integer('job_type');
            $table->integer('city_id');
            $table->integer('district_id');

            $table->string('address');
            $table->string('description');
            $table->string('logo');
            $table->string('banner');
            $table->string('images');

            $table->integer('company_type');
            $table->integer('created_by');
            $table->integer('updated_by');

            // $table->dateTime('created_at');
            // $table->dateTime('updated_at');
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
        Schema::dropIfExists('companies');
    }
}
