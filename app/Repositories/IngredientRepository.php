<?php

namespace App\Repositories;

use App\Models\Ingredient as Model;
//use Your Model

/**
 * Class IngredientRepository.
 */
class IngredientRepository extends CoreRepository
{
    /**
     * @return string
     *  Return the model
     */
    protected function getModelClass()
    {
        return Model::class;
    }
    public function getIngredient($id)
    {    
        return $this->startConditions()::find($id)->where('id', $id)->first();
    }

    /**
     * @return mixed
     */
    public function getAllIngredients()
    {    
         return $this->startConditions()->all();
    }
    /**
     * @return mixed
     */
    public function createIngredient($ingredient)
    {    
        return $this->startConditions()->create([
            'name'=> $ingredient->ingredient,
            ]);

    }

    public function updateIngredient($ingredient, $id)
    {    
        return $this->startConditions()
        ->findOrFail($id)
        ->update([
            'name' => $ingredient->ingredient,
        ]);

    }
    
    public function deleteIngredient($id)
    {
        $this->startConditions()->find($id)->recipes()->detach();
        return $this->startConditions()->findOrFail($id)->delete();
    }

    public function editQueryIngredient($request)
    {
        return $this->startConditions()->find($request->id)->recipes()->update([
            'quantity' => $request->quantity,
        ]);
    }
}
