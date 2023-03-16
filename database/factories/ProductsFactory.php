<?php

namespace Database\Factories;

use App\Models\Products;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductsFactory extends Factory
{
    protected $model = Products::class;

    public function definition()
    {
        return [
            'codigo' => $this->faker->uuid,
            'nome'  => $this->faker->name,
            'preco'  => $this->faker->randomFloat(3, 0, 10),
            'qty_disponivel'  => $this->faker->randomDigitNotNull,
            'marca' => $this->faker->company
        ];
    }
}