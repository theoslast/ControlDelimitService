<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddTblTerritorios extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tblTerritorios', function (Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->integer('idCongregacion')->unsigned();
            $table->integer('idEstadoTerritorio')->unsigned();
            $table->string('localidad', 20);
            $table->string('numero', 20);
            $table->integer('cantidadManzanas');
            $table->string('imagen', 200);
            $table->boolean('activo');
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
        Schema::dropIfExist('tblTerritorios');
    }
}
