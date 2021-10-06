<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePivotPeopleSpeciesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pivot_people_species', function (Blueprint $table) {
            $table->timestamps();
            $table->unsignedBigInteger('people_id');
            $table->unsignedBigInteger('specie_id');

            $table->foreign('people_id')->references('id')->on('peoples')
                        ->onDelete('restrict')
                        ->onUpdate('restrict');

            $table->foreign('specie_id')->references('id')->on('species')
                        ->onDelete('restrict')
                        ->onUpdate('restrict');


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pivot_people_species');
        $table->dropForeign('pivot_people_species_people_id_foreign')
                    ->onDelete('restrict')
                    ->onUpdate('restrict');
        $table->dropForeign('pivot_people_species_specie_id_foreign')
                    ->onDelete('restrict')
                    ->onUpdate('restrict');
    }
}
