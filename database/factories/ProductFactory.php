<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Product::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [

                'category_id' => random_int(1,10),
                'product_code' => $this->faker->ean8,
                'name' => $this->faker->word,
                'squ_code' => $this->faker->unique()->ean8,

                'price' => 100,
                'count' => 20,
                'product_satus' => 0,
                'stock_alart' => 0,

        ];
    }
}
