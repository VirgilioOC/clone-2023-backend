<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            UserSeeder::class,
            ClienteSeeder::class,
            TipoSeeder::class,
            ItemSeeder::class,
            PedidoSeeder::class,
            DetalleItemSeeder::class,
            ComponeSeeder::class,
        ]);
    }
}
