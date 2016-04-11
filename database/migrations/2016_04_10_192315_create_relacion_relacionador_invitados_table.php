<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRelacionRelacionadorInvitadosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('relacion_relacionador_invitados', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('relacionador_id')->unsigned();
            $table->foreign('relacionador_id')->references('id')->on('users');

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
        Schema::drop('relacion_relacionador_invitados');
    }
}
