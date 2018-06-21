<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePersonalVehiclesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('personal_vehicles', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('staff_vehicle_id')->unsiged();
            $table->string('vehicle_brand');
            $table->string('vehicle_no');
            $table->float('mileage');
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
        Schema::dropIfExists('personal_vehicles');
    }
}
