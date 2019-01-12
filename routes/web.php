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
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(["prefix" => '/dashboard', 'middleware' => 'auth'], function(){
  Route::get('/', function(){
    return view('dashboard.index');
  })->name('dashboard.index');

  Route::get('/clients', function(){
    return view('dashboard.clients');
  })->name('dashboard.clients');

  Route::get('/collections', function(){
    return view('dashboard.collections');
  })->name('dashboard.collections');

  Route::get('/commandes', function(){
    return view('dashboard.commandes');
  })->name('dashboard.commandes');

  Route::get('/produits', function(){
    return view('dashboard.produits');
  })->name('dashboard.produits');

  Route::get('/categories', function(){
    return view('dashboard.categories');
  })->name('dashboard.categories');

  Route::get('/addproduits', function(){
    return view('dashboard.addproduits');
  })->name('dashboard.addproduits');

  Route::get('/messages', function(){
    return view('dashboard.messages');
  })->name('dashboard.messages');

  Route::get('/utilisateurs', function(){
    return view('dashboard.utilisateurs');
  })->name('dashboard.utilisateurs');

  Route::get('ajouter/commande', function(){
    return view('dashboard.ajouter_commande');
  })->name('dashboard.add_commande');

  Route::get('/parametres', function(){
    return view('dashboard.parametres');
  })->name('dashboard.parametres');
  Route::get('/profile', 'ProfileController@index')->name('dashboard.profile');

});

Route::get('/logout', function(){
  Auth::logout();
  return Redirect::to('/login');
});
