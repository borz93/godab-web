<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNotificationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('notifications', function (Blueprint $table) {
            $table->increments('id');
            $table->string('body');
            $table->string('category');
            $table->string('url')->nullable();
            $table->boolean('read')->default(false);
            $table->integer('from')->unsigned();
            $table->foreign('from')->references('id')->on('users')->onDelete('cascade');
            $table->integer('to')->unsigned();
            $table->foreign('to')->references('id')->on('users')->onDelete('cascade');
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
        Schema::drop('notifications');
    }
}
