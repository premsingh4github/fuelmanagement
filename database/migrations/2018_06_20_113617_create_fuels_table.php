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
            $table->integer('staff_name');
            $table->integer('month');
            $table->string('mode');
            $table->integer('amount')->nullable();
            $table->integer('petrolpump_name');
            $table->string('other')->nullable();
            $table->integer('quantity');
            $table->double('current_km');
            $table->double('previous_km');
            $table->string('reciver_name');
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
