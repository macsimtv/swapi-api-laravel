<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVehiclesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vehicles', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('model');
            $table->bigInteger('cost_in_credits');
            $table->float('length', 10, 2);
            $table->bigInteger('max_atmosphering_speed');
            $table->bigInteger('crew');
            $table->bigInteger('passengers');
            $table->bigInteger('cargo_capacity');
            $table->string('consumables');
            $table->string('vehicle_class');
            $table->timestamps();
            $table->string('url');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('vehicles');
    }
}
