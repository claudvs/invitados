<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('users')->insert([
            'name' => 'Alfa',
            'apellidos' => 'Omega',
            'usuario' => 'iAlfa',
            'password' => bcrypt('123456789'),
            'tipo' => 'Administrador',
            'estado' => '1',
        ]);
    }
}
