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
        Schema::create('peoples', function(Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->integer('height');
            $table->integer('mass');
            $table->string('hair_color');
            $table->string('skin_hair');
            $table->string('eye_color');
            $table->string('birth_year');
            $table->string('gender');
            $table->string('homeworld');
            $table->string('films');
            $table->string('species');
            $table->string('vehicles');
            $table->string('starships');
            $table->timestamp();
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
        Schema::dropIfExists('peoples');
    }
}
