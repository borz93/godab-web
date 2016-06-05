<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNutritionalInfoDatasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nutritional_info_datas', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->integer('quantity_x');
            $table->integer('quantity_y');
            $table->integer('nutritional_info_id')->unsigned();
            $table->foreign('nutritional_info_id')->references('id')->on('nutritional_infos')->onDelete('cascade');
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
        Schema::drop('nutritional_info_datas');
    }
}
