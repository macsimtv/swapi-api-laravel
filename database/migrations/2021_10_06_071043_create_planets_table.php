<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePlanetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('planets', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
			$table->string('name');
			$table->integer('rotation_period');
			$table->integer('orbital_period');
			$table->integer('diameter');
			$table->string('climate');
			$table->string('gravity');
			$table->integer('surface_water');
			$table->integer('population');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('planets');
    }
}
