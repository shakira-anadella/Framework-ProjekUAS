<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        Category::create(['name' => 'Seminar']);
        Category::create(['name' => 'Festival']);
        Category::create(['name' => 'Workshop']);
        Category::create(['name' => 'Kompetisi']);
        Category::create(['name' => 'Pameran']);
    }
}
