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
            'name' => $this->faker->name(),
            'email' => $this->faker->email(),
            'hotline1' => $this->faker->numerify('###-###-####'),
            'hotline2' => $this->faker->numerify('###-###-####'),
            'company_name' => $this->faker->company(),
            'address' => $this->faker->sentence(),
        ];
    }
}
