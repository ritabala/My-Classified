<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMessagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('messages', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('from_id')->unsigned();
            $table->foreign('from_id')->references('id')->on('users')->onDelete('CASCADE')->onUpdate('CASCADE');

            $table->integer('to_id')->unsigned();
            $table->foreign('to_id')->references('id')->on('users')->onDelete('CASCADE')->onUpdate('CASCADE');


            $table->text('body');

            $table->integer('advertisement_id')->unsigned();
            $table->foreign('advertisement_id')->references('id')->on('advertisements')->onDelete('CASCADE')->onUpdate('CASCADE');

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
        Schema::dropIfExists('messages');
    }
}
