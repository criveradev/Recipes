<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Recipe;
use Illuminate\Http\Request;

class RecipeController extends Controller
{
    public function index()
    {
        #Muestrame las recetas junto con su categoria, etiqueta, usuario.
        return Recipe::with('category', 'tags', 'user')->get();
    }

    public function store()
    {
        # code...
    }

    public function show(Recipe $recipe)
    {
        return $recipe->load('category', 'tags', 'user');
    }

    public function update()
    {
        # code...
    }
    public function destroy()
    {
        # code...
    }
}
