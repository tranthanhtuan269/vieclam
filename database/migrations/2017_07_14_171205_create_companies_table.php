<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCompaniesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('companies', function(Blueprint $table) {
            $table->increments('id');
            $table->integer('user');
            $table->string('banner');
            $table->string('logo');
            $table->string('name');
            $table->string('sub_name');
            $table->string('tax_code');
            $table->string('sologan');
            $table->integer('size');
            $table->string('jobs');
            $table->integer('city');
            $table->integer('district');
            $table->integer('town');
            $table->string('address');
            $table->string('description');
            $table->string('images');
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
        Schema::drop('companies');
    }
}
