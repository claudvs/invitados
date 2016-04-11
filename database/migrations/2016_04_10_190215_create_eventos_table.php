<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEventosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('eventos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('evento_nombre', 300);
            $table->string('evento_lugar' , 300);
           
            $table->string('evento_fecha');
            $table->string('evento_hora');
            $table->string('evento_cupo');
            $table->string('evento_observaciones', 600);
            $table->timestamps();

            //nombre, lugar, fecha, hora, Cupo, Obsevaciones
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('eventos');
    }
}
