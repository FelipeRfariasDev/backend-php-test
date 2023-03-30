<?php

namespace Tests\Unit;

use App\Models\Products;
use Tests\TestCase;
use App\Models\Thread;

class ProductTruncateTest extends TestCase
{
    //testes Unit focam no ponto de vista do desenvolvedor.

    /**
     * Truncate model products
     *
     * @return void
     */
    public function test_truncate_products()
    {
        $products = new Products();
        $products->truncate();
        $this->assertTrue(true);
    }
}
