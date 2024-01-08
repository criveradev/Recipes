<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\CategoryCollection;
use App\Http\Resources\CategoryResource;
use App\Models\Category;
use Illuminate\Http\Request;
use ResourceBundle;

class CategoryController extends Controller
{
    #Trabajamos con una colección
    public function index()
    {
        return new CategoryCollection(Category::all());
    }

    #Trabajamos con un recurso
    public function show(Category $category)
    {
        $category = $category->load('recipes');

        return new CategoryResource($category);
    }
}
