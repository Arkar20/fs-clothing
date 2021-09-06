<?php

namespace Database\Factories;

use App\Models\Size;
use Illuminate\Database\Eloquent\Factories\Factory;

class SizeFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Size::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        // $sizes = ['big', 'small', 'medium', 'large'];

        return [
            'size' => $this->faker->word(),
            'waist' => $this->faker->numberBetween(10, 20),
            'hip' => $this->faker->numberBetween(10, 20),
            'inside_leg' => $this->faker->numberBetween(10, 20),
            'weight' => $this->faker->numberBetween(10, 20),
        ];
    }
}
