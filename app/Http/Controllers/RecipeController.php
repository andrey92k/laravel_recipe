<?php

namespace App\Http\Controllers;

use App\Repositories\RecipeRepository;
use App\Repositories\IngredientRepository;
use Illuminate\Http\Request;
use Auth;

class RecipeController extends Controller
{

    /**
     * @var RecipeRepository
     */
    private $recipeRepository;

    /**
     * @var IngredientRepository
     */
    private $ingredientRepository;

    /**
     * RecipeRepository constructor.
     * @param RecipeRepository $recipeRepository
     */
    public function __construct(RecipeRepository $recipeRepository, IngredientRepository $ingredientRepository)
    {
        $this->recipeRepository = $recipeRepository;
        $this->ingredientRepository = $ingredientRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $recipes = $this->recipeRepository->getAllWithRecipe();

        if(!Auth::check()){
           return view('recipe.guest_index', compact('recipes'));
        }

        return view('recipe.index', compact('recipes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

       $allIngredients = $this->ingredientRepository->getAllIngredients();
       return view('recipe.create', compact('allIngredients'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->recipeRepository->createRecipe($request);

        return redirect(route('recipe.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $ingredients = $this->recipeRepository->getIngredients($id);

        $recipe = $this->recipeRepository->getRecipe($id);

        if(!Auth::check()){
         return view('recipe.guest_show', compact('ingredients','recipe'));
        }    

        return view('recipe.show', compact('ingredients','recipe'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $ingredients = collect($this->recipeRepository->getIngredients($id));
        $recipe = $this->recipeRepository->getRecipe($id);
        $allIngredients = $this->ingredientRepository->getAllIngredients();

        return view('recipe.edit', compact('ingredients','recipe', 'allIngredients'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {   
     
        
      $test = $this->recipeRepository->EditRecipe($request, $id);

       return redirect(route('recipe.index'));
    }
    

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->recipeRepository->deleteRecipe($id);

        return redirect(route('recipe.index'));
    }
}
