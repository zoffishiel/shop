<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/commandes', 'CommandesController@index');
Route::get('/users', 'UsersController@index');
Route::get('/vendeur/collections', 'UsersController@getCollections');

Route::get('/categories', 'CategoriesController@index');
Route::get('/products', 'ProductsController@index');

Route::group(['prefix' => '/add'], function(){
  Route::post('/product','ProductsController@addProduct');
  Route::post('/category','CategoriesController@addCategory');
});

Route::group(['prefix' => 'drop'], function(){
  Route::get('/product/{id}', 'ProductsController@dropProduct');
  Route::get('/category/{id}', 'CategoriesController@dropCategory');
});

Route::post('/commandes/add', 'CommandesController@addCommande');

 // Route::get('/profile','ProfileController@UserProfile');
