<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reservations', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            //$table->foreign('user_id')->references('id')->on('users');
            $table->unsignedBigInteger('center_id');
           // $table->foreign("center_id")->references("id")->on("centers");
            $table->string('first_name');
            $table->string('last_name');
            $table->string('id_num');
            $table->string('email');
            $table->string('phone');
            $table->string('address');
            $table->date('birth_day');
            $table->boolean('gender');
            $table->boolean('result');
            $table->dateTime('appointment'); 
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
        Schema::dropIfExists('reservations');
    }
};
