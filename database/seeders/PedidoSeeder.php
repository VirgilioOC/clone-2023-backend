<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Integer;
use Illuminate\Support\Str;
use Faker\Factory as FakerFactory;

class PedidoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $clientes = DB::table('cliente')->get();
        $faker = FakerFactory::create();

        DB::table('pedido')->insert([
            'cliente_id' => 1,
            'importe' => 4180,
            'direccion' => Str::random(8),
            'direccion_altura' => random_int(0000, 9999),
            'estado' => $faker->randomElement(['pendiente', 'en preparacion', 'en camino', 'entregado', 'cancelado']),
        ]);


        DB::table('pedido')->insert([
            'cliente_id' => 2,
            'importe' => 3830,
            'direccion' => Str::random(8),
            'direccion_altura' => random_int(0000, 9999),
            'estado' => $faker->randomElement(['pendiente', 'en preparacion', 'en camino', 'entregado', 'cancelado']),
        ]);

        DB::table('pedido')->insert([
            'cliente_id' => 3,
            'importe' => 8200,
            'direccion' => Str::random(8),
            'direccion_altura' => random_int(0000, 9999),
            'estado' => $faker->randomElement(['pendiente', 'en preparacion', 'en camino', 'entregado', 'cancelado']),
        ]);

        DB::table('pedido')->insert([
            'cliente_id' => 4,
            'importe' => 3750,
            'direccion' => Str::random(8),
            'direccion_altura' => random_int(0000, 9999),
            'estado' => $faker->randomElement(['pendiente', 'en preparacion', 'en camino', 'entregado', 'cancelado']),
        ]);


    }
}
