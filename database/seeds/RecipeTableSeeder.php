<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class RecipeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $recipe = [];

        for ($i = 0; $i <= 10; $i++){
            $name = 'Название #' . $i;
            $description =  'Описание рецепта #' . $i;
           
            $recipe[] = [
                'name' => $name,
                'slug' => date("YmdHis").'-'.Str::slug($name),
                'description' => $description,
            ];
        }
        \DB::table('recipes')->insert($recipe);
    }
}
