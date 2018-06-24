<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFuelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fuels', function (Blueprint $table) {
            $table->increments('id');
            $table->date('date');
            $table->integer('staff_id');
            $table->integer('month_id');
            $table->string('mode');
            $table->integer('amount')->nullable();
            $table->integer('petrolpump_id')->unsigned();
            $table->string('other')->nullable();
            $table->double('current_km');
            $table->double('previous_km');
            $table->integer('receiver_id')->unsigned();
            $table->foreign('receiver_id')->references('id')->on('staff');
            $table->integer('user')->unsigned();
            $table->foreign('user')->references('id')->on('users');
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
        Schema::dropIfExists('fuels');
    }
}
