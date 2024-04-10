<?php

namespace Database\Seeders;

use App\Models\Tag;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

class TagsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(Faker $faker)
    {
        for ($i = 1; $i <= 10; $i++) {
            $new_tag = new Tag();
            $new_tag->name = $faker->word();
            $new_tag->slug = Str::slug($new_tag->name);
            $new_tag->save();
        }
    }
}
