<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ForeignKeys extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		//People - Film
		Schema::table('pivot_people_films', function (Blueprint $table) {
			$table->foreign('people_id')->references('id')->on('peoples')
				->onDelete('restrict')
				->onUpdate('restrict');
		});
		Schema::table('pivot_people_films', function (Blueprint $table) {
			$table->foreign('film_id')->references('id')->on('films')
				->onDelete('restrict')
				->onUpdate('restrict');
		});

		//People - Vehicle
		Schema::table('pivot_people_vehicles', function (Blueprint $table) {
			$table->foreign('people_id')->references('id')->on('peoples');
			$table->foreign('vehicle_id')->references('id')->on('vehicles');
		});
	}

	public function down()
	{
		Schema::table('pivot_people_films', function (Blueprint $table) {
			$table->dropForeign('pivot_people_films_people_id_foreign');
		});
		Schema::table('pivot_people_films', function (Blueprint $table) {
			$table->dropForeign('pivot_people_films_film_id_foreign');
		});

		//People - Vehicle
		Schema::table('pivot_people_vehicles', function (Blueprint $table) {
			$table->dropForeign('pivot_people_vehicles_people_id_foreign')
				->onDelete('restrict')
				->onUpdate('restrict');
			$table->dropForeign('pivot_people_vehicles_vehicle_id_foreign')
				->onDelete('restrict')
				->onUpdate('restrict');
		});
	}
}
