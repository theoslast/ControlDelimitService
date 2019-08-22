<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddFkToTerritorios extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('tblterritorios', function (Blueprint $table) {
            $table->foreign('idCongregacion')->references('id')->on('tblcongregaciones');
            $table->foreign('idEstadoTerritorio')->references('id')->on('tblEstados');
        }); 
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('tblterritorios', function(Blueprint $table){
            $table->dropForeign(['idCongregacion']);
            $table->dropForeign(['idEstadoTeritorio']);
        });
    }
}
