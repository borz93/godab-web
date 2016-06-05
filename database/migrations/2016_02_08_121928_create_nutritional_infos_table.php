<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNutritionalInfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nutritional_infos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->integer('analysis_id')->unsigned();
            $table->foreign('analysis_id')->references('id')->on('analysis')->onDelete('cascade');
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
        Schema::drop('nutritional_infos');
    }
}
