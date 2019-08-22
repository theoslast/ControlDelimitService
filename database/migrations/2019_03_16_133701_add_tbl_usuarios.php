<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddTblUsuarios extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tblUsuarios', function (Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->string('nombre', 20);
            $table->string('apellido', 20);
            $table->string('usuario', 30);
            $table->string('contrasenia',30);
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
        Schema::dropIfExist('tblUsuarios');
    }
}
