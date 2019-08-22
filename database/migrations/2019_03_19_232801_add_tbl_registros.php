<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddTblRegistros extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tblRegistros', function (Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->integer('idCongregacion')->unsigned();
            $table->integer('numero');
            $table->string('localidad', 30);
            $table->string('conductor', 20);
            $table->datetime('fecha');
            $table->string('manzanas', 30);
            $table->string('observacion', 100)->nullable();
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
        Schema::dropIfExist('tblRegistros');
    }
}
