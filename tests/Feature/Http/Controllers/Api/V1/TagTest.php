<?php

namespace Tests\Feature\Http\Controllers\Api\V1;

use App\Models\Tag;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\Response;
use Laravel\Sanctum\Sanctum;
use Tests\TestCase;

class TagTest extends TestCase
{
    use RefreshDatabase;

    public function test_index()
    {
        #Crea un usuario
        Sanctum::actingAs(User::factory()->create());

        #Crea unas etiquetas
        $tags = Tag::factory(2)->create();

        #Respuesta
        $response = $this->getJson('/api/V1/tags');
        $response->assertStatus(Response::HTTP_OK) //Cuando nos conectamos a index esperamos un 200?
            ->assertJsonCount(2, 'data') //Cuando recibimos la respuesta son dos elementos?
            ->assertJsonStructure([ //Cuando recibimos la estructura es identica a la siguiente?
                'data' => [
                    [
                        'id',
                        'type',
                        'attributes' => ['name'],
                        'relationships' => [
                            'recipes' => []
                        ],
                    ]
                ]
            ]);
    }

    public function test_show()
    {
        #Crea un usuario
        Sanctum::actingAs(User::factory()->create());

        #Crea una etiqueta
        $tag = Tag::factory()->create();

        #Respuesta
        $response = $this->getJson('/api/V1/tags/' . $tag->id);
        $response->assertStatus(Response::HTTP_OK)
            ->assertJsonStructure([
                'data' => [
                    'id',
                    'type',
                    'attributes' => ['name'],
                    'relationships' => [
                        'recipes' => []
                    ],
                ]
            ]);
    }
}
