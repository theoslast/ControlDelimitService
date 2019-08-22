<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddFkToManzanas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('tblmanzanas', function (Blueprint $table) {
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
        Schema::table('tblmanzanas', function (Blueprint $table) {
            $table->dropForeign(['idTerritorio']);
        });
    }
}
