<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCaloriasHasDietasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('calorias_has_dietas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('caloria_id');
            $table->foreign('caloria_id')->references('id')->on('calorias')->onDelete('cascade');

            $table->unsignedBigInteger('dieta_id');
            $table->foreign('dieta_id')->references('id')->on('dietas')->onDelete('cascade');


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('calorias_has_dietas');
    }
}
