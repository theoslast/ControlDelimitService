<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddFkToRegistros extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('tblregistros', function (Blueprint $table) {
            $table->foreign('idCongregacion')->references('id')->on('tblCongregaciones');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('tblregistros', function (Blueprint $table) {
            $table->dropForeign(['idCongregacion']);
        });
    }
}
