<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Category;
use App\Models\Recipe;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        User::factory()->create([
            'name' => 'Claudio Rivera',
            'email' => 'crivera@app.com',
        ]);
        
        User::factory(29)->create();

        Category::factory(12)->create();
        Recipe::factory(100)->create();
        Tag::factory(40)->create();

        # Relación Many to Many
        $recipes = Recipe::all();
        $tags    = Tag::all();

        foreach ($recipes as $recipe) {
            $recipe->tags()->attach($tags->random(2, 4));
        }
    }
}
