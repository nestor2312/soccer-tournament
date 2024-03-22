<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEliminatoriasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('eliminatorias', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('equipo_a_id');
            $table->unsignedBigInteger('equipo_b_id');
            $table->integer('marcador1');
            $table->integer('marcador2');
            $table->integer('numPartido');
            $table->foreign('equipo_a_id')->references('id')->on('equipos');
            $table->foreign('equipo_b_id')->references('id')->on('equipos');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('eliminatorias');
    }
}
