<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddTblManzanas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tblManzanas', function (Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->integer('idTerritorio')->unsigned();
            $table->string('letra', 2);
            $table->boolean('estado');
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
        Schema::dropIfExist('tblManzanas');
    }
}
