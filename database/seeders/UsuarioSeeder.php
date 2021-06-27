<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsuarioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('usuario')->insert([
            'nombre'=>'Jona',
            'apellido'=>'Rios',
            'dni'=>33123123,
            'email'=>'jona@gmail.com',
            'password'=>'petrel2021'
        ]);
        DB::table('usuario')->insert([
            'nombre'=>'Administrativo',
            'apellido'=>'Universidad',
            'dni'=>33123111,
            'email'=>'unadmin@fi.uncoma.edu.ar',
            'password'=>'petrel2021'
        ]);
        DB::table('usuario')->insert([
            'nombre'=>'Un usuario',
            'apellido'=>'Estudiante',
            'dni'=>34123456,
            'email'=>'estudiante@hotmail.com',
            'password'=>'petrel2021'
        ]);
    }
}
