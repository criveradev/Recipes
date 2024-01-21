<?php

use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Route;


#Ruta de inicio de sesion como invitado
Route::post('login', [LoginController::class, 'store']);

#Proteccion de las rutas, con versionamiento
Route::middleware('auth:sanctum')->group(function () {

    require __DIR__.'/api_v1.php';
    require __DIR__.'/api_v2.php';
});
