<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Recipe extends Model
{
    use HasFactory;

    #Propiedad de asignacion de datos masiva
    protected $fillable = [
        'category_id',
        'title',
        'description',
        'ingredients',
        'instructions',
        'image',
    ];

    #Una categoria pertenece a una receta.
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    #Una receta pertenece a un usuario.
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    #Una receta puede tener muchas etiquetas.
    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }
}
