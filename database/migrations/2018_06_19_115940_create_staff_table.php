<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStaffTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('staff', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->integer('designation_id');
            $table->date('joining_date');
            $table->string('licence_no') ;
            $table->integer('vehicle_ownership');
            $table->integer('vehicle_type');
            $table->integer('office_vehicle')->nullable();
            $table->string('vehicle_brand')->nullable();
            $table->integer('mileage');
            $table->integer('monthly_kota');
            $table->string('engine_oil');
            $table->string('driving_person_name');
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
        Schema::dropIfExists('staff');
    }
}
