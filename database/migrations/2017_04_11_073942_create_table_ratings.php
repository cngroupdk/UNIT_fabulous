<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateTableRatings extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        \Schema::create('boxes_ratings', function (Blueprint $table) {
            $table->increments('id');

            $table->unsignedInteger('feedback_id');
            $table->unsignedInteger('category_id');

            $table->integer('rating');

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
        \Schema::drop('boxes_ratings');
    }
}
