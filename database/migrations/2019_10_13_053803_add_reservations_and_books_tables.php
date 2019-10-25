<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddReservationsAndBooksTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('books', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->string('isbn');
            $table->string('year');  
            $table->string('return_date');
            $table->string('borrow_date');  
            $table->boolean('is_available');         
            $table->dateTime('created_date');
        });

        Schema::create('reservations', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('books_id')->unsigned();
            $table->integer('users_id')->unsigned();
            $table->foreign('books_id')->references('id')->on('books');
            $table->foreign('users_id')->references('id')->on('users');
            $table->dateTime('created_date');
        });        
        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('reservations');
        Schema::dropIfExists('books');
    }
}
