<?php

namespace App\Http\Controllers;

use App\Repositories\IngredientRepository;
use Illuminate\Http\Request;
use Auth;

class IngredientController extends Controller
{


    /**
     * @var IngredientRepository
     */
    private $ingredientRepository;

    /**
     * RecipeRepository constructor.
     * @param RecipeRepository $recipeRepository
     */
    public function __construct(IngredientRepository $ingredientRepository)
    {
        $this->ingredientRepository = $ingredientRepository;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $allIngredients = $this->ingredientRepository->getAllIngredients();

        if(!Auth::check()){
         return view('ingredient.guest_index', compact('allIngredients'));
        }
        return view('ingredient.index', compact('allIngredients'));

       
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('ingredient.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $this->ingredientRepository->createIngredient($request);

        return redirect(route('ingredient.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $ingredient = $this->ingredientRepository->getIngredient($id);

        return view('ingredient.edit', compact('ingredient'));
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
        $this->ingredientRepository->updateIngredient($request ,$id);

        return redirect(route('ingredient.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->ingredientRepository->deleteIngredient($id);

        return redirect(route('ingredient.index'));
    }

    public function AjaxStore(Request $request)
    {

        $result = $this->ingredientRepository->createIngredient($request);
        echo json_encode($result);
       // return redirect(route('ingredient.index'));
    }
    public function AjaxQuantity(Request $request)
    {
        $result = $this->ingredientRepository->editQueryIngredient($request);
       // return redirect(route('ingredient.index'));
    }
}
