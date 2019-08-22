<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddTblCongregaciones extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tblCongregaciones', function (Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->string('nombre', 30);
            $table->string('codigo', 20)->unique();
            $table->string('password', 30);
            $table->string('circuito', 20);
            $table->integer('publicadores')->nullable();
            $table->integer('territorios')->nullable();
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
        Schema::dropIfExist('tblCongregaciones');
    }
}
