<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class ClienteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('cliente')->insert([
            'DNI' => 19337992,
            'nombre' => "María",
            'apellido' => 'Wallace',
            'telefono' => "1142846",
            'password' => Hash::make("genesis"),
        ]);

        DB::table('cliente')->insert([
            'DNI' => 84619611,
            'nombre' => "Joseph",
            'apellido' => 'Joestar',
            'telefono' => "4176817",
            'password' => Hash::make("OHMYGOD"),
        ]);

        DB::table('cliente')->insert([
            'DNI' => 44237015,
            'nombre' => "Darío",
            'apellido' => 'Brando',
            'telefono' => "1748624",
            'password' => Hash::make("BLUELABEL"),
        ]);


        DB::table('cliente')->insert([
            'DNI' => 15991841,
            'nombre' => "Antonio",
            'apellido' => 'Zeppeli',
            'telefono' => "1369642",
            'password' => Hash::make("HEYBABY"),
        ]);
    }
}

