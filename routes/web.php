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

Route::resource('/adresse', \App\Http\Controllers\AdresseController::class);
Route::resource('/article', \App\Http\Controllers\ArticleController::class);
Route::resource('/avis', \App\Http\Controllers\AvisController::class);
Route::resource('/commande', \App\Http\Controllers\CommandeController::class);
Route::resource('/favori', \App\Http\Controllers\favoriController::class);
Route::resource('/gamme', \App\Http\Controllers\GammeController::class);
Route::resource('/promotion', \App\Http\Controllers\PromotionController::class);
Route::resource('/user', \App\Http\Controllers\UserController::class);

// Route pour le panier (pour pouvoir supprimer, modifier, ajouter ...)

// Route::get('article', "ArticleController@show")->name('article.show');
// Route::post('article/add/{product}', "ArticleController@add")->name('article.add');
// Route::get('article/remove/{product}', "ArticleController@remove")->name('article.remove');
// Route::get('article/empty', "ArticleController@empty")->name('article.empty');

Route::get('panier', [App\Http\Controllers\PanierController::class, 'show'])->name('panier.show');
Route::post('panier/add/{article}', [App\Http\Controllers\PanierController::class, 'add'])->name('panier.add');
Route::get('panier/remove/{article}',[App\Http\Controllers\PanierController::class, 'remove'])->name('panier.remove');
Route::get('panier/empty', [App\Http\Controllers\PanierController::class, 'empty'])->name('panier.empty');



