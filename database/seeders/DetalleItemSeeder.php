<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DetalleItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $items = DB::table('item')->get();

        foreach($items as $item){
            DB::table('detalle_item')->insert([
                'id_item' => $item->id,
                'tamaño' => 'chico',
                'multiplicador_tamaño' => 0.8,
            ]); 

            DB::table('detalle_item')->insert([
                'id_item' => $item->id,
                'tamaño' => 'mediano',
                'multiplicador_tamaño' => 1,
            ]); 

            DB::table('detalle_item')->insert([
                'id_item' => $item->id,
                'tamaño' => 'grande',
                'multiplicador_tamaño' => 1.5,
            ]);       
        }
    }
}
