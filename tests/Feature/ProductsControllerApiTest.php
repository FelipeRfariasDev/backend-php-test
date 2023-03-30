<?php

namespace Tests\Feature;

use GuzzleHttp\Client;
use Tests\TestCase;
use App\Models\Thread;

class ProductsControllerApiTest extends TestCase
{

    //Testes de feature no ponto do (usuário) que nesse caso é quem irá consumir os metodos da api

    /**
     * Add /api/products via post
     *
     * @return void
     */
    public function test_post_api_add_product()
    {
        $client = "http://app-test-api/api/products";

        $requestClient = new Client();

        $product['codigo'] = 1;
        $product['nome'] = "Produto1";
        $product['preco'] = 150;
        $product['qty_disponivel'] = 1;
        $product['marca'] = "Marca1";

        $response = $requestClient->post($client,
            ['headers' =>
                [
                    'Content-Type' => 'application/json'
                ],
                'body' => json_encode($product)
            ]);

        $this->assertEquals($response->getStatusCode(),201);
    }

    /**
     * Update /api/products via put
     *
     * @return void
     */
    public function test_put_api_update_product()
    {
        $client = "http://app-test-api/api/products/1";

        $requestClient = new Client();

        $product['codigo'] = 1;
        $product['nome'] = "Produto1 Alterado";
        $product['preco'] = 300;
        $product['qty_disponivel'] = 2;
        $product['marca'] = "Marca1 Alterado";

        $response = $requestClient->put($client,
            ['headers' =>
                [
                    'Content-Type' => 'application/json'
                ],
                'body' => json_encode($product)
            ]);

        $this->assertEquals($response->getStatusCode(),201);
    }

    /**
     * Buscar produtos /api/products pagination via get nome like %Produto1% or marca like %Produto1%
     *
     * @return void
     */
    public function test_get_api_products_like_pagination()
    {
        $response = $this->withHeaders([
            'Content-type' => 'application/json',
        ])->get('/api/products', ['buscar' => 'Produto1']);

        $response->assertStatus(200);
    }

    /**
     * Delete /api/products/{id}
     *
     * @return void
     */
    public function test_delete_api_destroy_product()
    {
        $client = "http://app-test-api/api/products/1";

        $requestClient = new Client();

        $response = $requestClient->delete($client,
            ['headers' =>
                [
                    'Content-Type' => 'application/json'
                ]
            ]);

        $this->assertEquals($response->getStatusCode(),201);
    }
}
