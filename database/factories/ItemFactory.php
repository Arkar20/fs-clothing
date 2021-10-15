<?php

namespace Database\Factories;

use App\Models\Item;
use App\Models\User;
use App\Models\Brand;
use App\Models\Category;
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
            'desc' => $this->faker->paragraph(1),
            'category_id' => Category::factory()->create()->id,
            'brand_id' => Brand::factory()->create()->id,
            'user_id' => User::factory()->create()->id,
            'price' => $price,
            'retail_price' => $price - 10,
            'retail_qty' => rand(5,10),
            'total_qty' => 10,
            'img1' => '/photos/items/img' . rand(1, 10) . '.jpg',
            'img2' => '/photos/items/img' . rand(1, 10) . '.jpg',
            'img3' => '/photos/items/img' . rand(1, 10) . '.jpg',
        ];
    }
}
