<?php

namespace App\Repositories;

use App\Models\Recipe;
use App\Models\Ingredient;
use Illuminate\Support\Str;
// use App\Models\IngredientRecipe;
//use Your Model

/**
 * Class RecipeRepository.
 */
class RecipeRepository extends CoreRepository
{
    /**
     * @return string
     *  Return the model
     */
    protected function getModelClass()
    {
        return Recipe::class;
    }

    /**
     * @return mixed
     */
    public function getAllWithRecipe()
    {       
        return $this->startConditions()->all();
    }

    public function getIngredients($id)
    {    
        return $this->startConditions()::find($id)->ingredients()->get();
    }

    public function getRecipe($id)
    {    
        return $this->startConditions()::find($id)->where('id', $id)->first();
    }

    public function createRecipe($request)
    {    
        $data = [];
        $quantity = $request->quantity;  

        $recipe_id = $this->startConditions()->create([
            'name'=> $request->name,
            'slug' => date("YmdHis").'-'.Str::slug($request->name),
            'description'=> $request->description,
            ]);

        foreach($request->ingredient as $key => $val ) {
            $ingredient = Ingredient::where('name', $val)->first();
            if(array_key_exists($key, $quantity)){
                $data[$key] = [
                    'recipe_id' => $recipe_id->id,
                    'ingredient_id' => $ingredient->id,
                    'quantity' =>  $request->quantity[$key],
                ];
            }

        }
          

        foreach ($data as $key => $value) {
            if (!empty($value['quantity'])) {
                $this->startConditions()->ingredients()->sync([$value['recipe_id'] => ['ingredient_id' => $value['ingredient_id'], 'recipe_id' => $value['recipe_id'], 'quantity' => $value['quantity'] ]]);
            }
                       
        } 
    }

    public function EditRecipe($request, $id)
    {    
        
        $this->startConditions()->find($id)->ingredients()->detach();
        $data = [];
        $quantity = $request->quantity;  

        $recipe_id = $this->startConditions()
            ->findOrFail($id)
            ->update([
                'name' => $request->name,
                'slug' => date("YmdHis").'-'.Str::slug($request->name),
                'description'=> $request->description,
        ]);


        foreach($request->ingredient as $key => $val ) {
            $ingredient = Ingredient::where('name', $val)->first();
            if(array_key_exists($key, $quantity)){
                $data[$key] = [
                    'recipe_id' => $id,
                    'ingredient_id' => $ingredient->id,
                    'quantity' =>  $request->quantity[$key],
                ];
            }

        }               
        foreach ($data as $key => $value) {
            $this->startConditions()->ingredients()->sync([$value['recipe_id'] => ['ingredient_id' => $value['ingredient_id'], 'recipe_id' => $value['recipe_id'], 'quantity' => $value['quantity'] ]]);                         
        }        
    }
    public function deleteRecipe($id)
    {
        $this->startConditions()->find($id)->ingredients()->detach();
        return $this->startConditions()->findOrFail($id)->delete();
    }

}
