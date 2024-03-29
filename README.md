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

    % php artisan make:controller Api/V1/CategoryController 
    % php artisan make:controller Api/V1/RecipeController 
    % php artisan make:controller Api/V1/TagController 

    % php artisan make:controller Api/V2/CategoryController 
    % php artisan make:controller Api/V2/RecipeController 
    % php artisan make:controller Api/V2/TagController

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

# Para verificar el rendimiento de la API

    % composer require laravel/telescope
    % php artisan telescope:install
    % php artisan migrate

# Vamos a aislar las validaciones

    % php artisan make:request StoreRecipeRequest
    % php artisan make:request UpdateRecipeRequest

# Deshabilitar depurador como dev

    % env. -> APP_DEBUG = false

# Autorizacion: Tokens & Middlewares

    % composer require laravel/sanctum

# Crear Tokens

    % php artisan tinker
    > $user = App\Models\User::find(5);
    > $user->createToken('app');

# Eliminar Tokens

    % $user->tokens()->delete();

# Creacion login usuario

    % php artisan make:controller LoginController

# Politicas de acceso

    % php artisan make:policy RecipePolicy

# Antes de hacer testing debes habilitar la base de datos fake

    > phpunit.xml
            > <env name="DB_CONNECTION" value="sqlite"/>
            > <env name="DB_DATABASE" value=":memory:"/>

# Testing

    % php artisan make:test /Http/Controllers/Api/V1/CategoryTest 
    % php artisan make:test /Http/Controllers/Api/V1/TagTest
    % php artisan make:test /Http/Controllers/Api/V1/RecipeTest

    % php artisan make:test /Http/Controllers/Api/V2/CategoryTest 
    % php artisan make:test /Http/Controllers/Api/V2/TagTest
    % php artisan make:test /Http/Controllers/Api/V2/RecipeTest

# Prueba de test creados

    % php artisan test
