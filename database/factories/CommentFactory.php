<?php

namespace Database\Factories;

use App\Models\Item;
use App\Models\Comment;
use App\Models\Customer;
use Illuminate\Database\Eloquent\Factories\Factory;

class CommentFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Comment::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
           'item_id'=> Item::factory()->create(),
           'desc'=>$this->faker->sentence(),
           'customer_id'=>Customer::factory()->create(),
           'is_favourite' => false
        ];
    }
}
