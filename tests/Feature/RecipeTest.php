<?php

namespace Tests\Feature;

use App\Models\Category;
use App\Models\Recipe;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\Response;
use Illuminate\Http\UploadedFile;
use Laravel\Sanctum\Sanctum;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;

class RecipeTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    public function test_index()
    {
        #Crea un usuario y una categoria
        Sanctum::actingAs(User::factory()->create());
        Category::factory()->create();


        #Crea una receta
        $recipes = Recipe::factory(2)->create();

        #Respuesta
        $response = $this->getJson('/api/recipes');
        $response->assertStatus(Response::HTTP_OK) //Cuando nos conectamos a index esperamos un 200?
            ->assertJsonCount(2, 'data') //Cuando recibimos la respuesta son dos elementos?
            ->assertJsonStructure([ //Cuando recibimos la estructura es identica a la siguiente?
                'data' => [
                    [
                        'id',
                        'type',
                        'attributes' => ['title', 'description']
                    ]
                ]
            ]);
    }

    public function test_store()
    {
        #Crea un usuario, categoria, etiqueta
        Sanctum::actingAs(User::factory()->create());

        $category = Category::factory()->create();
        $tag = Tag::factory()->create();

        $data = [
            'category_id'  => $category->id,
            'title'        => $this->faker->sentence,
            'description'  => $this->faker->paragraph,
            'ingredients'  => $this->faker->text,
            'instructions' => $this->faker->text,
            'tags'         => $tag->id,
            'image'        => UploadedFile::fake()->image('recipe.png'),

        ];

        #Respuesta
        $response = $this->postJson('/api/recipes/', $data);
        $response->assertStatus(Response::HTTP_CREATED);
    }

    public function test_show()
    {
        #Crea un usuario y una categoria
        Sanctum::actingAs(User::factory()->create());
        Category::factory()->create();


        #Crea una receta
        $recipe = Recipe::factory()->create();

        #Respuesta
        $response = $this->getJson('/api/recipes/' . $recipe->id);
        $response->assertStatus(Response::HTTP_OK)
            ->assertJsonStructure([
                'data' => [
                    'id',
                    'type',
                    'attributes' => ['title', 'description']
                ]
            ]);
    }

    public function test_destroy()
    {
        #Crea un usuario y una categoria
        Sanctum::actingAs(User::factory()->create());
        Category::factory()->create();

        #Crea una receta
        $recipe = Recipe::factory()->create();

        $response = $this->deleteJson('/api/recipes/' . $recipe->id);
        $response->assertStatus(Response::HTTP_NO_CONTENT);
    }
}
