<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;

class CategoryCollection extends ResourceCollection
{
    public function toArray(Request $request): object
    {
        return $this->collection->map(function ($category) {
            return [
                'id' => $category->id,
                'type' => 'category',
                'attributes' => [
                    'name' => $category->name
                ],
            ];
        });
    }
}
