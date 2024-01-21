<?php

namespace Tests\Feature\Http\Controllers\Api\V2;

use App\Models\Category;
use App\Models\Recipe;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\Response;
use Laravel\Sanctum\Sanctum;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;

class RecipeTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    public function test_index_V2()
    {
        #Crea un usuario y una categoria
        Sanctum::actingAs(User::factory()->create());
        Category::factory()->create();


        #Crea una receta
        $recipes = Recipe::factory(5)->create();

        #Respuesta
        $response = $this->getJson('/api/V2/recipes');
        $response->assertStatus(Response::HTTP_OK) //Cuando nos conectamos a index esperamos un 200?
            ->assertJsonCount(5, 'data') //Cuando recibimos la respuesta son dos elementos?
            ->assertJsonStructure([ //Cuando recibimos la estructura es identica a la siguiente?
                'data'  => [],
                'links' => [], //Paginacions
                'meta'  => [],
            ]);
    }
}
