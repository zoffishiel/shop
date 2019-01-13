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

// PROTECT DATA

Route::group(["middleware" => "auth"], function(){

  // GET DATA ROUTES
  Route::get('/messages', 'MessagesController@index');
  Route::get('/commandes', 'CommandesController@index');
  Route::get('/users', 'UsersController@index');
  Route::get('/collections', 'UsersController@getCollections');
  Route::get('/categories', 'CategoriesController@index');
  Route::get('/products', 'ProductsController@index');
  Route::get('/clients', 'ClientsController@index');

  // GET DATA BY ID ROUTES
  Route::get('/commande/{id}', 'CommandesController@getCommande');
  Route::get('/user/{id}', 'UsersController@getUser');
  Route::get('/category/{id}', 'CategoriesController@getCategory');
  Route::get('/product/{id}', 'ProductsController@getProduct');
  Route::get('/tracking/{track_number}', 'TrackingController@track');
  Route::get('/client/{id}', 'ClientsController@getClient');
  Route::get('/slider/{id}', 'SliderController@getSlider');

  // ADD ROUTES
  Route::group(['prefix' => '/add'], function(){
    Route::post('/category', 'CategoriesController@addCategory');
    Route::post('/product','ProductsController@addProduct');
    Route::post('/commande', 'CommandesController@addCommande');
    Route::post('/client', 'ClientsController@addClient')->name('addClient');
    Route::post('/message', 'MessagesController@addMessage');
    Route::post('/service', 'ServiceLivrasionController@addService');
    Route::post('/article', 'ArticlesController@addArticle');
    Route::post('/slider', 'SliderController@addSlider');
  });

  // ADD ROUTES
  Route::group(['prefix' => '/update'], function(){
    Route::post('/category', 'CategoriesController@updateCategory');
    Route::post('/product','ProductsController@updateProduct');
    Route::post('/commande', 'CommandesController@updateCommande');
    Route::post('/client', 'ClientsController@updateClient');
    Route::post('/message', 'MessagesController@updateMessage');
    Route::post('/service', 'ServiceLivrasionController@updateService');
    Route::post('/article', 'ArticlesController@updateArticle');
    Route::post('/slider', 'SliderController@updateSlider');
    Route::post('/user', 'UsersController@updateInfos');

  });

  // DELETE ROUTES
  Route::group(['prefix' => 'drop'], function(){
    Route::post('/users', 'UsersController@dropUser');
    Route::post('/product', 'ProductsController@dropProduct');
    Route::post('/categories', 'CategoriesController@dropCategory');
    Route::post('/commande', 'CommandesController@dropCommande');
    Route::post('/clients', 'ClientsController@dropClient');
    Route::post('/message', 'MessagesController@dropMessage');
    Route::post('/service', 'ServiceLivrasionController@dropService');
    Route::post('/article', 'ArticlesController@dropArticle');
    Route::post('/slider', 'SliderController@dropSlider');
  });
});
