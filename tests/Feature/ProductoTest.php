<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Producto;
use Illuminate\Support\Facades\Notification;

Notification::fake();

class ProductoTest extends TestCase
{
    
    use RefreshDatabase;
    /**
     * A basic feature test example.
     */
    public function test_example(): void
    {
        $producto = new Producto([
            'nombre' => '',
            'descripcion' => 'Descripción del producto',
            'precio' => 100,
        ]);

        
        $this->assertFalse($producto->isValid());

       
        $producto = new Producto([
            'nombre' => 'Producto Valido',
            'descripcion' => 'Descripción del producto',
            'precio' => 100,
        ]);

        
        $this->assertTrue($producto->isValid());
    }
}
