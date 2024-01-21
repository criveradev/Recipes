<?php

use App\Http\Controllers\Api\V2\RecipeController;
use Illuminate\Support\Facades\Route;


#Proteccion de las rutas
Route::prefix('V2')->group(function () {

    Route::get('recipes',[RecipeController::class, 'index']);

});
