<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class IngredientRecipe extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ingredient_recipe', function (Blueprint $table) {
           
            $table->bigInteger('ingredient_id')->unsigned();           
            $table->bigInteger('recipe_id')->unsigned();
            
            $table->string('quantity', 20);

            $table->timestamps();
            $table->softDeletes();

            $table->foreign('ingredient_id')->references('id')->on('ingredients');
            $table->foreign('recipe_id')->references('id')->on('recipes');
          
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
