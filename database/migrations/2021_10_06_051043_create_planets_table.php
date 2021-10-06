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
			$table->string('name')->unique();
			$table->string('rotation_period');
			$table->string('orbital_period');
			$table->string('diameter');
			$table->string('terrain');
			$table->string('climate');
			$table->string('gravity');
			$table->string('surface_water');
			$table->string('population');
			$table->string('url')->nullable();
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
