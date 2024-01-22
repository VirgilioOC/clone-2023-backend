<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('item')->insert([
            'tipo_id' => '1',
            'nombre' => 'Gomitas Mogul',
            'precio' => 150,
            'activo' => true,
            'path_imagen' => 'https://res.cloudinary.com/digitaldynamos/image/upload/v1686689236/items/Gomitas_Mogul_lvdo85.png',
        ]);

        DB::table('item')->insert([
            'tipo_id' => '1',
            'nombre' => 'Papas Lays',
            'precio' => 350, 
            'activo' => true,
            'path_imagen' => 'https://res.cloudinary.com/digitaldynamos/image/upload/v1686689093/items/Papas_Lays_iwnncd.png',
        ]);

        DB::table('item')->insert([
            'tipo_id' => '1',
            'nombre' => 'Grisines',
            'precio' => 500,
            'activo' => true,
            'path_imagen' => 'https://res.cloudinary.com/digitaldynamos/image/upload/v1686689147/items/Grisines_bavvp6.png',
        ]);

        DB::table('item')->insert([
            'tipo_id' => '2',
            'nombre' => 'Hamburguesa doble con queso',
            'precio' => 1800,
            'activo' => true,
            'path_imagen' => 'https://res.cloudinary.com/digitaldynamos/image/upload/v1686689089/items/Hamburguesa_doble_con_queso_t8jenf.png',
        ]);

        DB::table('item')->insert([
            'tipo_id' => '2',
            'nombre' => 'Hamburguesa clasica',
            'precio' => 2000,
            'activo' => true,
            'path_imagen' => 'https://res.cloudinary.com/digitaldynamos/image/upload/v1686689042/items/Hamburguesa_clasica_nz40nx.png',
        ]);

        DB::table('item')->insert([
            'tipo_id' => '2',
            'nombre' => 'Hamburguesa queso cheddar',
            'precio' => 2500,
            'activo' => true,
            'path_imagen' => 'https://res.cloudinary.com/digitaldynamos/image/upload/v1686689232/items/Hamburguesa_queso_cheddar_zwopiu.png',
        ]);

        DB::table('item')->insert([
            'tipo_id' => '3',
            'nombre' => 'Flan con crema',
            'precio' => 1200,
            'activo' => true,
            'path_imagen' => 'https://res.cloudinary.com/digitaldynamos/image/upload/v1686689230/items/Flan_con_crema_kbsbky.png',
        ]);

        DB::table('item')->insert([
            'tipo_id' => '3',
            'nombre' => 'Porcion de lemonpie',
            'precio' => 1500,
            'activo' => true,
            'path_imagen' => 'https://res.cloudinary.com/digitaldynamos/image/upload/v1686688793/items/Porcion_de_lemonpie_zb0ujt.png',
        ]);

        DB::table('item')->insert([
            'tipo_id' => '3',
            'nombre' => 'Brownie con bocha de helado',
            'precio' => 1100,
            'activo' => true,
            'path_imagen' => 'https://res.cloudinary.com/digitaldynamos/image/upload/v1686689146/items/Brownie_con_bocha_de_helado_kym3qr.png',
        ]);

        DB::table('item')->insert([
            'tipo_id' => '4',
            'nombre' => 'Ensalada Waldorf',
            'precio' => 1100,
            'activo' => true,
            'path_imagen' => 'https://res.cloudinary.com/digitaldynamos/image/upload/v1686689146/items/Ensalada_Waldorf_h0ilwg.png',
        ]);

        DB::table('item')->insert([
            'tipo_id' => '4',
            'nombre' => 'Ensalada primavera',
            'precio' =>  1250,
            'activo' => true,
            'path_imagen' => 'https://res.cloudinary.com/digitaldynamos/image/upload/v1686689041/items/Ensalada_primavera_fvjyq2.png',
        ]);

        DB::table('item')->insert([
            'tipo_id' => '4',
            'nombre' => 'Ensalada rusa',
            'precio' => 1100,
            'activo' => true,
            'path_imagen' => 'https://res.cloudinary.com/digitaldynamos/image/upload/v1686689087/items/Ensalada_rusa_e9xmep.png',
        ]);

        DB::table('item')->insert([
            'tipo_id' => '5',
            'nombre' => 'Fideos a la carbonara',
            'precio' => 1900,
            'activo' => true,
            'path_imagen' => 'https://res.cloudinary.com/digitaldynamos/image/upload/v1686689088/items/Fideos_a_la_carbonara_yrfvxj.png',
        ]);

        DB::table('item')->insert([
            'tipo_id' => '5',
            'nombre' => 'Sorrentinos con salsa portuguesa',
            'precio' => 1900,
            'activo' => true,
            'path_imagen' => 'https://res.cloudinary.com/digitaldynamos/image/upload/v1686688792/items/Sorrentinos_con_salsa_portuguesa_ndbtej.png',
        ]);

        DB::table('item')->insert([
            'tipo_id' => '5',
            'nombre' => 'Ravioles de ricota y verdura',
            'precio' => 2200,
            'activo' => true,
            'path_imagen' => 'https://res.cloudinary.com/digitaldynamos/image/upload/v1686688790/items/Ravioles_de_ricota_y_verdura_dqfk2c.png',
        ]);

        DB::table('item')->insert([
            'tipo_id' => '6',
            'nombre' => 'Pizza de muzzarella',
            'precio' => 2250,
            'activo' => true,
            'path_imagen' => 'https://res.cloudinary.com/digitaldynamos/image/upload/v1686689043/items/Pizza_de_muzzarela_pjw4qc.png',
        ]);

        DB::table('item')->insert([
            'tipo_id' => '6',
            'nombre' => 'Pizza de panceta y huevo',
            'precio' => 2800,
            'activo' => true,
            'path_imagen' => 'https://res.cloudinary.com/digitaldynamos/image/upload/v1686689043/items/Pizza_de_panceta_y_huevo_vzxros.png',
        ]);

        DB::table('item')->insert([
            'tipo_id' => '6',
            'nombre' => 'Pizza napolitana',
            'precio' => 2500,
            'activo' => true,
            'path_imagen' => 'https://res.cloudinary.com/digitaldynamos/image/upload/v1686689148/items/Pizza_napolitana_xdmglq.png',
        ]);

        DB::table('item')->insert([
            'tipo_id' => '7',
            'nombre' => 'Coca-Cola',
            'precio' => 600,
            'activo' => true,
            'path_imagen' => 'https://res.cloudinary.com/digitaldynamos/image/upload/v1686688792/items/Coca-Cola_iy3hul.png',
        ]);

        DB::table('item')->insert([
            'tipo_id' => '7',
            'nombre' => 'Agua Mineral',
            'precio' => 550,
            'activo' => true,
            'path_imagen' => 'https://res.cloudinary.com/digitaldynamos/image/upload/v1686689150/items/Agua_Mineral_omln2x.png',
        ]);

        DB::table('item')->insert([
            'tipo_id' => '7',
            'nombre' => 'Exprimido de Naranja',
            'precio' => 850,
            'activo' => true,
            'path_imagen' => 'https://res.cloudinary.com/digitaldynamos/image/upload/v1686688793/items/Exprimido_de_Naranja_ts2s3l.png',
        ]);

        DB::table('item')->insert([
            'tipo_id' => '8',
            'nombre' => 'Vino Malbec',
            'precio' => 2200,
            'activo' => true,
            'path_imagen' => 'https://res.cloudinary.com/digitaldynamos/image/upload/v1686688792/items/Vino_Malbec_c4yneu.png',
        ]);

        DB::table('item')->insert([
            'tipo_id' => '8',
            'nombre' => 'Fernet con Coca-Cola',
            'precio' => 1800,
            'activo' => true,
            'path_imagen' => 'https://res.cloudinary.com/digitaldynamos/image/upload/v1686689230/items/Fernet_con_Coca-Cola_cjikpt.png',
        ]);

        DB::table('item')->insert([
            'tipo_id' => '8',
            'nombre' => 'Cerveza Heineken',
            'precio' => 1350,
            'activo' => true,
            'path_imagen' => 'https://res.cloudinary.com/digitaldynamos/image/upload/v1686689041/items/Cerveza_Heineken_kcq4l5.png',
        ]);
    }
}
