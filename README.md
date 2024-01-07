<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

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