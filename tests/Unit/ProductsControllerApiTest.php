<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ProductsControllerApiTest extends TestCase
{
    /**
     * Buscar produtos /api/products pagination via get nome like %camisetas% or marca like %camisetas%
     *
     * @return void
     */
    public function test_get_api_products_like_pagination()
    {
        $response = $this->withHeaders([
            'Content-type' => 'application/json',
        ])->get('/api/products', ['buscar' => 'camiseta']);
 
        $response->assertStatus(200);
    }
}
