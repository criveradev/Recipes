<?php

namespace Tests\Feature;

use App\Models\Category;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\Response;
use Laravel\Sanctum\Sanctum;
use Tests\TestCase;

class CategoryTest extends TestCase
{
    use RefreshDatabase;

    public function test_index()
    {
        #Crea un usuario
        Sanctum::actingAs(User::factory()->create());

        #Crea unas categorias
        $categories = Category::factory(2)->create();

        #Respuesta
        $response = $this->getJson('/api/categories');
        $response->assertJsonCount(2, 'data')
            ->assertJsonStructure([
                'data' => [
                    [
                    'id',
                    'type',
                    'attributes' => ['name']
                    ]
                ]
            ]);
    }

    public function test_show()
    {
        #Crea un usuario
        Sanctum::actingAs(User::factory()->create());

        #Crea unas categorias
        $category = Category::factory()->create();

        #Respuesta
        $response = $this->getJson('/api/categories/'.$category->id);
        $response->assertStatus(Response::HTTP_OK)
            ->assertJsonStructure([
                'data' => [
                    'id',
                    'type',
                    'attributes' => ['name']
                ]
            ]);
    }
}
