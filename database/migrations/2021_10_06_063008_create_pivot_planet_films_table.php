<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePivotPlanetFilmsTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('pivot_planet_films', function (Blueprint $table) {
			$table->timestamps();
			$table->unsignedBigInteger('planet_id');
			$table->unsignedBigInteger('film_id');

			$table->foreign('planet_id')->references('id')->on('planets')
				->onDelete('cascade')
				->onUpdate('cascade');

			$table->foreign('film_id')->references('id')->on('films')
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
		Schema::dropIfExists('pivot_planet_films');
	}
}
