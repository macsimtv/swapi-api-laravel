<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePivotPeopleVehiclesTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('pivot_people_vehicles', function (Blueprint $table) {
			$table->timestamps();
			$table->unsignedBigInteger('people_id');
			$table->unsignedBigInteger('vehicle_id');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::dropIfExists('pivot_people_vehicles');
	}
}
