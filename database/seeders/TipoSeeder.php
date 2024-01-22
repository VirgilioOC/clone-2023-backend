<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TipoSeeder extends Seeder
{
    /**
     * Run the database seeds. 
     */
    public function run(): void
    {
        DB::table('tipo')->insert([
            'etiqueta' => 'snack',
            'activo' => true,
        ]);

        DB::table('tipo')->insert([
            'etiqueta' => 'hamburguesa',
            'activo' => true,
        ]);

        DB::table('tipo')->insert([
            'etiqueta' => 'postre',
            'activo' => true,
        ]);

        DB::table('tipo')->insert([
            'etiqueta' => 'ensalada',
            'activo' => true,
        ]);

        DB::table('tipo')->insert([
            'etiqueta' => 'pasta',
            'activo' => true,
        ]);

        DB::table('tipo')->insert([
            'etiqueta' => 'pizza',
            'activo' => true,
        ]);

        DB::table('tipo')->insert([
            'etiqueta' => 'bebida no alcoholica',
            'activo' => true,
        ]);

        DB::table('tipo')->insert([
            'etiqueta' => 'bebida alcoholica',
            'activo' => true,
        ]);
    }
}
