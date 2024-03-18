<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEncuestasHasEnfermedadesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('encuestas_has_enfermedades', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('encuesta_id');
            $table->foreign('encuesta_id')->references('id')->on('encuestas')->onDelete('cascade');

            $table->unsignedBigInteger('enfermedads_id');
            $table->foreign('enfermedads_id')->references('id')->on('enfermedads')->onDelete('cascade');


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('encuestas_has_enfermedades');
    }
}
