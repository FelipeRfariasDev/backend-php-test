<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Products;

class ProductsSeeders extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i=1;$i<50;$i++){
            $products = new Products();
            $products->codigo = $i;
            $products->nome = "camiseta"." - ".$i;
            $products->preco = ($i*7).".0".$i;
            $products->qty_disponivel = $i*7;
            $products->marca = "marca"." - ".$i;
            $products->save();
        }
    }
}
