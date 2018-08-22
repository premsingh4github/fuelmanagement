<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNonofficialfuelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nonofficialfuels', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('organization');
            $table->string('vehicle_no');
            $table->date('date');
            $table->integer('month_id');
            $table->string('mode');
            $table->integer('amount')->nullable();
            $table->string('coupon')->nullable();
            $table->integer('petrolpump_id')->unsigned();
            $table->string('receiver_name');
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users');
            $table->float('petrol');
            $table->float('engine_oil');
            $table->float('diseal');
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
        Schema::dropIfExists('nonofficialfuels');
    }
}
