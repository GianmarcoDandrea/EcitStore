<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(Faker $faker)
    {
        {
            for ($i = 1; $i <= 10; $i++) {
                $category = new Category();
                $category->name = $faker->word();
                $category->slug = Str::slug($category->name);
                $category->save();
            }
        }
    }
}
