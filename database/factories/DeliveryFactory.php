<?php

namespace Database\Factories;

use App\Models\Delivery;
use Illuminate\Database\Eloquent\Factories\Factory;

class DeliveryFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Delivery::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'township' => $this->faker->word(),
            'zipcode' => rand(10000, 20000),
            'price' => round(rand(3000, 15000) / 1000) * 1000,
        ];
    }
}
