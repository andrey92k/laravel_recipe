<?php

use Illuminate\Database\Seeder;

class IngredientRecipeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $ingredient_recipe = [];

        for ($i = 0; $i <= 10; $i++){
            $ingredient_id =  rand(1,10);
            $recipe_id = rand(1,10);
            
            $quantity = 'Количество #' . $i;
           
            $ingredient_recipe[] = [
                'ingredient_id' => $ingredient_id,
                'recipe_id' => $recipe_id,
                
                'quantity' => $quantity,
            ];
        }
        \DB::table('ingredient_recipe')->insert($ingredient_recipe);
    }
}
