<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

# Creamos los modelos de nuestra DB

    % php artisan make:model Category -mf
    % php artisan make:model Recipes -mf
    % php artisan make:model Tag -mf

# Creamos una migracion

    % php artisan make:migration create_recipe_tag_table 

# Migramos nuestra DB

    % php artisan migrate

# Migramos las tablas y sus datos falsos

    % php artisan migrate:fresh --seed

# Controladores

    % php artisan make:controller Api/CategoryController 
    % php artisan make:controller Api/RecipeController 
    % php artisan make:controller Api/TagController 

# Configuramos las rutas

    % Route::get('recipes',               [RecipeController::class, 'index']);
    % Route::post('recipes',              [RecipeController::class, 'store']);
    % Route::get('recipes/{recipe}',      [RecipeController::class, 'show']);
    % Route::put('recipes/{recipe}',      [RecipeController::class, 'update']);
    % Route::delete('recipes/{recipe}',   [RecipeController::class, 'destroy']);

# Visualizar las rutas que hemos creado (endpoint)

    % php artisan route:list --path=api

# Definimos el alcance que tendra nuestra API en su controlador respectivo

    % index
    % store
    % show
    % update
    % destroy

# Consistencia entre endpoints: recursos y colecciones

    % php artisan make:resource CategoryResource
    % php artisan make:resource CategoryCollection
    % php artisan make:resource TagResource
    % php artisan make:resource RecipeResource
