<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRelacionEventoInvitadosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('relacion_evento_invitados', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('evento_id')->unsigned();
            $table->foreign('evento_id')->references('id')->on('eventos');

            $table->integer('invitado_id')->unsigned();
            $table->foreign('invitado_id')->references('id')->on('users');

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
        Schema::drop('relacion_evento_invitados');
    }
}
