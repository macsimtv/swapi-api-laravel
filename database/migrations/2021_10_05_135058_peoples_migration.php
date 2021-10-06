<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class PeoplesMigration extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('peoples', function (Blueprint $table) {
			$table->id();
			$table->string('name')->unique();
			$table->string('height');
			$table->string('mass');
			$table->string('hair_color');
			$table->string('skin_color');
			$table->string('eye_color');
			$table->string('birth_year');
			$table->string('gender');
			$table->timestamps();
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
		Schema::dropIfExists('peoples');
	}
}
