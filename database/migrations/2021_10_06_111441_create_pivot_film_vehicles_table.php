<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePivotFilmVehiclesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pivot_film_vehicles', function (Blueprint $table) {
            $table->id();
            $table->timestamps();

            $table->foreign('film_id')->references('id')->on('films')
				->onDelete('cascade')
				->onUpdate('cascade');

			$table->foreign('vehicle_id')->references('id')->on('vehicles')
				->onDelete('cascade')
				->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pivot_film_vehicles');
    }
}
