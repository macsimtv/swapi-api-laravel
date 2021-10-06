<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePivotFilmSpeciesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pivot_film_species', function (Blueprint $table) {
            $table->timestamps();
            $table->unsignedBigInteger('film_id');
            $table->unsignedBigInteger('specie_id');
			$table->foreign('film_id')->references('id')->on('films')
				->onDelete('cascade')
				->onUpdate('cascade');

			$table->foreign('specie_id')->references('id')->on('species')
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
        Schema::dropIfExists('pivot_film_species');
    }
}
