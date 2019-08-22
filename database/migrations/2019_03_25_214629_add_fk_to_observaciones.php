<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddFkToObservaciones extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('tblobservaciones', function (Blueprint $table) {
            $table->foreign('idTerritorio')->references('id')->on('tblterritorios');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('tblobservaciones', function (Blueprint $table) {
            $table->dropForeign(['idTerritorio']);
        });
    }
}
