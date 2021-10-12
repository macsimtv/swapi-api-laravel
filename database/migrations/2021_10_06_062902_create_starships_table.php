<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStarshipsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('starships', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
            $table->string('model');
            $table->string('manufacturer');
            $table->string('cost_in_credits');
            $table->string('length');
            $table->string('max_atmosphering_speed');
            $table->string('crew');
            $table->string('cargo_capacity');
            $table->string('consumables');
            $table->string('hyperdrive_rating');
            $table->string('MGLT');
            $table->string('starship_class');
            $table->string('pilots');
            $table->string('films');
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
        Schema::dropIfExists('starships');
    }
}
