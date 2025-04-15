<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('categorias')->insert([
            ['nombre' => 'Electrónicos', 'created_at' => now(), 'updated_at' => now()],
            ['nombre' => 'Ropa', 'created_at' => now(), 'updated_at' => now()],
            ['nombre' => 'Hogar', 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}
