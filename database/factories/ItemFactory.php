<?php

namespace Database\Factories;

use App\Models\Item;
use Illuminate\Database\Eloquent\Factories\Factory;

class ItemFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Item::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $price = $this->faker->numberBetween(30, 50);
        return [
            'name' => $this->faker->word(),
            'desc' => $this->faker->paragraph(3),
            'category_id' => rand(1, 10),
            'brand_id' => rand(1, 10),
            'user_id' => rand(1, 10),
            'price' => $price,
            'retail_price' => $price - 10,
            'img1' => '/photos/items/img' . rand(1, 10) . '.jpg',
            'img2' => '/photos/items/img' . rand(1, 10) . '.jpg',
            'img3' => '/photos/items/img' . rand(1, 10) . '.jpg',
        ];
    }
}
