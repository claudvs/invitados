<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInvitadosEventosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('invitados_eventos', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('evento_id')->unsigned();
            $table->foreign('evento_id')->references('id')->on('eventos');

            $table->integer('invitado_id')->unsigned();
            $table->foreign('invitado_id')->references('id')->on('users');

            $table->integer('relacionador_id')->unsigned();
            $table->foreign('relacionador_id')->references('id')->on('users');

            $table->enum('estado',['0','1','2']);

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
        Schema::drop('invitados_eventos');
    }
}
