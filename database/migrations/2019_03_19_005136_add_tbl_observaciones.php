<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddTblObservaciones extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tblObservaciones', function (Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->integer('idTerritorio')->unsigned();
            $table->string('manzana', 20)->nullable();
            $table->string('observacion', 100);
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
        Schema::dropIfExist('tblObservaciones');
    }
}
