<?php

namespace Database\Factories;

use App\Models\Item;
use App\Models\Size;
use App\Models\ItemDetail;
use App\Models\Color;

use Illuminate\Database\Eloquent\Factories\Factory;

class ItemDetailFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = ItemDetail::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'item_id' => Item::factory()->create()->id,
            'color_id' => Color::factory()->create()->id,
            'size_id' => Size::factory()->create()->id,
            'quantity' => rand(10, 20),
        ];
    }
}
