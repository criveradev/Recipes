<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Recipes>
 */
class RecipeFactory extends Factory
{
    public function definition(): array
    {
        return [
            'category_id'  => Category::all()->random()->id, //Consulta todas las categorias, toma una de manera aleatoria, trae el id 
            'user_id'      => User::all()->random()->id, ////Consulta todas los usuarios, toma una de manera aleatoria, trae el id 
            'title'        => fake()->sentence(),
            'description'  => fake()->text(),
            'ingredients'  => fake()->text(),
            'instructions' => fake()->text(),
            'image'        => fake()->imageUrl(640,480)
        ];
    }
}
