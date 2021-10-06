<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePivotFilmStarshipsTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('pivot_film_starships', function (Blueprint $table) {
			$table->timestamps();

			$table->unsignedBigInteger('film_id');
			$table->unsignedBigInteger('starship_id');

			$table->foreign('film_id')->references('id')->on('films')
				->onDelete('cascade')
				->onUpdate('cascade');

			$table->foreign('starship_id')->references('id')->on('starships')
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
		Schema::dropIfExists('pivot_film_starships');
	}
}
