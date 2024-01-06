<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Recipe extends Model
{
    use HasFactory;

    #Una receta puede tener muchas etiquetas
    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }
}
