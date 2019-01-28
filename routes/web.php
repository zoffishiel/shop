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

Route::get('/', 'HomeController@index')->name('welcome');

Route::get('/contact', function () {
    return view('contact');
})->name('contact');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(["prefix" => '/dashboard', 'middleware' => 'auth'], function(){
  Route::get('/', function(){
    return view('dashboard.index');
  })->name('dashboard.index');

  Route::get('/articles', function(){
    return view('dashboard.articles');
  })->name('dashboard.articles');

  Route::get('/clients', function(){
    return view('dashboard.clients');
  })->name('dashboard.clients');

  Route::get('/collections', function(){
    return view('dashboard.collections');
  })->name('dashboard.collections');

  Route::get('/commandes', function(){
    return view('dashboard.commandes');
  })->name('dashboard.commandes');

  Route::get('/produits', 'ProductsController@paginate')->name('dashboard.produits');

  Route::get('/categories', function(){
    return view('dashboard.categories');
  })->name('dashboard.categories');

  Route::get('/addproduits', 'ProductsController@addPage')->name('dashboard.addproduits');

  Route::get('/addclients', function(){
    return view('dashboard.addclients');
  })->name('dashboard.addclients');

  // addclients


  Route::get('/messages', function(){
    return view('dashboard.messages');
  })->name('dashboard.messages');

  Route::get('/addarticle', function(){
    return view('dashboard.ajouter_article');
  })->name('dashboard.ajouter_article');

  Route::get('/utilisateurs', function(){
    return view('dashboard.utilisateurs');
  })->name('dashboard.utilisateurs');

  Route::get('/details/produit/{id}', 'ProductsController@getProduct')->name("details");
  Route::get('ajouter/commande', 'CommandesController@CommandesView')->name('dashboard.add_commande');

  Route::get('/parametres', 'ParametresController@index')->name('dashboard.parametres');

  Route::get('/profile', 'ProfileController@index')->name('dashboard.profile');


});


  Route::get('/blog', function(){
    return view('blog.index');
  })->name('blog');

  Route::get('/post', function(){
    return view('blog.post');
  })->name('blog.post');

  Route::get('/about', function(){
    return view('about');
  })->name('about');


Route::get('/logout', function(){
  Auth::logout();
  return Redirect::to('/login');
});
