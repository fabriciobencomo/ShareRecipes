<?php

use Illuminate\Support\Facades\Route;

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
    return view('welcome');
});

Route::get('/recipes', 'RecipeController@index')->name('recipes.index');
Route::get('/recipes/create', 'RecipeController@create')->name('recipes.create');
Route::post('/recipes', 'RecipeController@store')->name('recipes.store');

Auth::routes(); 

