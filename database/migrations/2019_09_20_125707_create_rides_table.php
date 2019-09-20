<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRidesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rides', function (Blueprint $table) {
            $table->increments('id');
            $table->text('status');
            $table->timestamp('request_date');
            $table->float('pickup_lat');
            $table->float('pickup_lng');
            $table->text('pickup_location');
            $table->float('dropoff_lat');
            $table->float('dropoff_lng');
            $table->text('dropoff_location');
            $table->timestamp('pickup_date')->default(\DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('dropoff_date')->default(\DB::raw('CURRENT_TIMESTAMP'));
            $table->text('type');
            $table->integer('driver_id')->unsigned();
            $table->text('driver_name');
            $table->integer('driver_rating')->unsigned();
            $table->string('driver_pic');
            $table->text('car_make');
            $table->text('car_model');
            $table->string('car_number');
            $table->integer('car_year')->unsigned();
            $table->string('car_pic');
            $table->integer('duration');
            $table->text('duration_unit');
            $table->integer('distance')->unsigned();
            $table->text('distance_unit');
            $table->integer('cost')->unsigned();
            $table->text('cost_unit');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rides');
    }
}
