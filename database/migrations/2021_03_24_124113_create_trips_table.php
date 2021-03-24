<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTripsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('trips', function (Blueprint $table) {

            $table->id();
            $table->bigInteger('train_id');
            $table->bigInteger('source_station_id');
            $table->bigInteger('destination_station_id');
            $table->dateTime('source_departure_time');
            $table->dateTime('destination_arrival_time');
            $table->bigInteger('trip_cost');
            
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
        Schema::dropIfExists('trips');
    }
}
