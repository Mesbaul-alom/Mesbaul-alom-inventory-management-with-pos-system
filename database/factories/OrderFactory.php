<?php

namespace Database\Factories;

use App\Models\Order;
use Illuminate\Database\Eloquent\Factories\Factory;

class OrderFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Order::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $products = ['Mobile', 'Laptop', 'Watch', 'Mac Book'];
        static $invoice = 20;

    return [
        'product_name' => $products[rand(0, 3)],
        'currency' => 'BDT',
        'amount' => rand(1500, 2000),
        'invoice' => $invoice++,
        'status' => 'Pending',
    ];
    }
}
