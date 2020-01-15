<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return redirect(route('recipe.index'));
});

Route::resource('recipe', 'RecipeController');
Route::resource('ingredient', 'IngredientController');
Route::post('ajaxstore', 'IngredientController@AjaxStore')->name('ajaxstore.ajaxstore');
Route::post('ajaxquantity', 'IngredientController@AjaxQuantity')->name('ajaxquantity.ajaxquantity');
Auth::routes();
Route::get('/home', function () {
    return redirect(route('recipe.index'));
});
