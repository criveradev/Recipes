<?php

namespace App\Policies;

use App\Models\Recipe;
use App\Models\User;

class RecipePolicy
{
    #Solo puede actulizar una receta si le pertenece
    public function update(User $user, Recipe $recipe) : bool
    {
        return $user->id === $recipe->user_id;
    }

    #Solo puede eliminar una receta si le pertenece
    public function delete(User $user, Recipe $recipe) : bool
    {
        return $user->id === $recipe->user_id;
    }
}
