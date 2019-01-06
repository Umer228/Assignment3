<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHostelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hostels', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('hos_id');
            $table->string('hostelName')->unique();
            $table->string('city');
            $table->integer('rent')->nullable();
            $table->enum('hostelType',['oneStar','twoStar','threeStar','fourStar','fiveStar']);
            $table->boolean('furnishedRoom');
            $table->integer('roomAvailable');
            //$table->date('recordInsertedAt', strtotime(time,[now()]))->nullable();
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
        Schema::dropIfExists('hostels');
    }
}
