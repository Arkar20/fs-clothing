<?php

namespace Database\Seeders;

use App\Models\Item;
use App\Models\Size;
use App\Models\Brand;
use App\Models\Color;
use App\Models\Comment;
use App\Models\Category;
use App\Models\Delivery;
use App\Models\Supplier;
use App\Models\ItemDetail;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\User::factory(10)->create();
        \App\Models\Customer::factory(10)->create();

        Brand::factory()
            ->count(10)
            ->create();

        Category::factory()
            ->count(10)
            ->create();

        Color::factory()
            ->count(10)
            ->create();

        Supplier::factory()
            ->count(10)
            ->create();

        // Delivery::factory()
        //     ->count(10)
        //     ->create();

        // Item::factory(10)->create();

        $sizes = ['small', 'medium', 'large', 'extra large'];
        foreach ($sizes as $size) {
            Size::factory()->create(['size' => $size]);
        }
        Brand::all()->each(function($brand){Item::factory(5)->create(['brand_id'=>$brand->id]);});

        // Brand::all()->each(function($brand){ return Item::factory(5)->create(['brand_id'=>$brand->id]);  });

        // ItemDetail::factory(10)->create([
        //     'item_id' => Item::latest()->first()->id,
        // ]);

        Item::latest()->each(function($item){return Comment::factory(5)->create(['item_id'=>$item->id]);});
    }
}
