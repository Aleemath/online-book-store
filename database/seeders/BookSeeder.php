<?php

namespace Database\Seeders;

use App\Models\Book;
use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = Category::all();

        foreach ($categories as $category) {
            for ($i = 1; $i <= 5; $i++) {
                Book::create([
                    'title' => $category->name . " Book $i",
                    'author' => "Author $i",
                    'description' => Str::random(100),
                    'price' => rand(100, 500),
                    'is_available' => rand(0, 1),
                    'category_id' => $category->id,
                ]);
            }
        }
    }
}
