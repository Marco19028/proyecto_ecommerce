<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class ProductoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('productos')->insert([
            [
                'nombre' => 'Smartwatch Solar',
                'descripcion' => 'Reloj inteligente con carga solar.',
                'precio' => 1599.99,
                'stock' => 20,
                'imagen' => 'https://loremflickr.com/1280/720',
                'categoria_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nombre' => 'Camiseta Algodón Orgánico',
                'descripcion' => 'Suave, fresca y ecológica.',
                'precio' => 299.00,
                'stock' => 100,
                'imagen' => 'https://loremflickr.com/1280/720',
                'categoria_id' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nombre' => 'Foco LED Recargable',
                'descripcion' => 'Luz eficiente y portátil.',
                'precio' => 120.00,
                'stock' => 75,
                'imagen' => 'https://loremflickr.com/1280/720',
                'categoria_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nombre' => 'Sábanas de Bambú',
                'descripcion' => 'Juego de sábanas suaves y naturales.',
                'precio' => 899.90,
                'stock' => 30,
                'imagen' => 'https://loremflickr.com/1280/720',
                'categoria_id' => 3,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nombre' => 'Vestido de lino',
                'descripcion' => 'Vestido fresco y elegante para el verano.',
                'precio' => 479.00,
                'stock' => 50,
                'imagen' => 'https://loremflickr.com/1280/720',
                'categoria_id' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nombre' => 'Cargador Solar Portátil',
                'descripcion' => 'Carga tus dispositivos con energía solar.',
                'precio' => 650.50,
                'stock' => 40,
                'imagen' => 'https://loremflickr.com/1280/720',
                'categoria_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nombre' => 'Toallas de algodón reciclado',
                'descripcion' => 'Absorbentes y amigables con el ambiente.',
                'precio' => 250.00,
                'stock' => 60,
                'imagen' => 'https://loremflickr.com/1280/720',
                'categoria_id' => 3,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nombre' => 'Blusa de cáñamo',
                'descripcion' => 'Elegante y sostenible.',
                'precio' => 399.00,
                'stock' => 45,
                'imagen' => 'https://loremflickr.com/1280/720',
                'categoria_id' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
