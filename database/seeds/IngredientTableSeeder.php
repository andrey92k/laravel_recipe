<?php

use Illuminate\Database\Seeder;

class IngredientTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $ingredient = [];

        for ($i = 0; $i <= 10; $i++){
            $name = 'Название #' . $i;
           
            $ingredient[] = [
                'name' => $name,
            ];
        }
        \DB::table('ingredients')->insert($ingredient);
    }
}
