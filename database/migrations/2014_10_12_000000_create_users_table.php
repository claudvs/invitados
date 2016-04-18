<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('apellidos');
            $table->string('ci');
            $table->string('nroCelular');
            $table->date('fechanac');
            $table->enum('sexo',['Masculino','Feminino']);
            $table->string('email');
            $table->string('usuario');
            $table->string('password');
            $table->enum('tipo',['Administrador','Relacionador','Invitado']);
            $table->enum('estado',['0','1','2']);
            $table->string('codigo');
            $table->string('facebook_id');
            $table->rememberToken();
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
        Schema::drop('users');
    }
}
