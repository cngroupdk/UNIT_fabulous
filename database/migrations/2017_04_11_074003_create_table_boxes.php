<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateTableBoxes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        \Schema::create('boxes_boxes', function (Blueprint $table) {
            $table->increments('id');

            $table->unsignedInteger('user_id');


            $table->string('name');
            $table->string('code');
            $table->text('description')->nullable();

            $table->boolean('private')->default(true);

            $table->nullableTimestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        \Schema::drop('boxes_boxes');
    }
}
