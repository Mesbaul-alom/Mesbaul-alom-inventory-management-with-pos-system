<?php

namespace Database\Factories;

use App\Models\Supplier;
use Illuminate\Database\Eloquent\Factories\Factory;

class SupplierFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Supplier::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
           'name' => $this->faker->name,
           'father_name' => $this->faker->name,
           'mother_name' => $this->faker->name,
           'permanent_address' => $this->faker->address ,
           'present_address' => $this->faker->address ,
           'email' => $this->faker->unique()->email ,
         'mobile_number' => "01235649858",

           'username' => $this->faker->name,
           'password' => $this->faker->name,

        ];
    }
}
