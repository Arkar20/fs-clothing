<?php

namespace Database\Seeders;

use App\Models\Brand;
use App\Models\Color;
use App\Models\Category;
use App\Models\Delivery;
use App\Models\Supplier;
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

        Delivery::factory()
            ->count(10)
            ->create();
    }
}
