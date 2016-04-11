<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRelacionEventoRelacionadorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('relacion_evento_relacionadors', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('evento_id')->unsigned();
            $table->foreign('evento_id')->references('id')->on('eventos');

            $table->integer('relacionador_id')->unsigned();
            $table->foreign('relacionador_id')->references('id')->on('users');

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
        Schema::drop('relacion_evento_relacionadors');
    }
}
