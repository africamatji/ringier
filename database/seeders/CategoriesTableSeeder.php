<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            ['name' => 'Furniture', 'created_at' => now(), 'updated_at' => now() ],
            ['name' => 'Electronics', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Cars', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Property', 'created_at' => now(), 'updated_at' => now()],
        ];

        Category::insert($categories);
    }
}
