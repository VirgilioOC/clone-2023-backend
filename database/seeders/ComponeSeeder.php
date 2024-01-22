<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ComponeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $pedidos = DB::table('pedido')->get();
        $items = DB::table('item')->get();


        DB::table('compone')->insert([
            'codigo_pedido' => 1,
            'id_detalle' => 2, //Mogul mediano 150
        ]);

        DB::table('compone')->insert([
            'codigo_pedido' => 1,
            'id_detalle' => 2, //Mogul mediano 150 + 150
        ]);

        DB::table('compone')->insert([
            'codigo_pedido' => 1,
            'id_detalle' => 15, //Hamburguesa Clasica grande 300 + 3000 
        ]);

        DB::table('compone')->insert([
            'codigo_pedido' => 1,
            'id_detalle' => 25, //Brownie con bocha de helado 3300+880 = 4180
        ]);




        DB::table('compone')->insert([
            'codigo_pedido' => 2,
            'id_detalle' => 4, //Papas lays pequeñas 280
        ]);

        DB::table('compone')->insert([
            'codigo_pedido' => 2,
            'id_detalle' => 30, //Ensalada Waldorf grande 280+1650
        ]);

        DB::table('compone')->insert([
            'codigo_pedido' => 2,
            'id_detalle' => 38, //Fideos a la carbonara medianos 280+1650+1900 = 3830
        ]);



        DB::table('compone')->insert([
            'codigo_pedido' => 3,
            'id_detalle' => 51 , //Pizza de panceta y huevo grande 4200
        ]);

        DB::table('compone')->insert([
            'codigo_pedido' => 3,
            'id_detalle' => 65 , //Vino Malbec mediano 4200+2200
        ]);

        DB::table('compone')->insert([
            'codigo_pedido' => 3,
            'id_detalle' => 21 , //Flan c crema grande 4200+2200+1800 = 8200
        ]);



        DB::table('compone')->insert([
            'codigo_pedido' => 4,
            'id_detalle' => 9 , //GRISINES GRANDE 750
        ]);

        DB::table('compone')->insert([
            'codigo_pedido' => 4,
            'id_detalle' => 9 , //GRISINES GRANDE 750*2
        ]);

        DB::table('compone')->insert([
            'codigo_pedido' => 4,
            'id_detalle' => 9 , //GRISINES GRANDE 750*3
        ]);

        DB::table('compone')->insert([
            'codigo_pedido' => 4,
            'id_detalle' => 9 , //GRISINES GRANDE 750*4
        ]);

        DB::table('compone')->insert([
            'codigo_pedido' => 4,
            'id_detalle' => 9 , //GRISINES GRANDE 750*5
        ]);

    }
}
