<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('recipe_tag', function (Blueprint $table) {
            $table->id();

            #Relación con tabla recipe. 
            $table->unsignedBigInteger('recipe_id');
            $table->foreign('recipe_id')->references('id')->on('recipes')->cascadeOnDelete();

            #Relación con tabla tag.
            $table->unsignedBigInteger('tag_id');
            $table->foreign('tag_id')->references('id')->on('tags')->cascadeOnDelete();
            
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('recipe_tag');
    }
};
