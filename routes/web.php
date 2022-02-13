<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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

Route::post('/resetpassword', [\App\Http\Controllers\UserController::class, 'resetpassword'])->name('resetpassword');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Route pour le panier (pour pouvoir supprimer, modifier, ajouter ...)

Route::get('panier', [App\Http\Controllers\PanierController::class, 'show'])->name('panier.show');
Route::post('panier/add/{article}', [App\Http\Controllers\PanierController::class, 'add'])->name('panier.add');
Route::get('panier/remove/{article}',[App\Http\Controllers\PanierController::class, 'remove'])->name('panier.remove');
Route::get('panier/empty', [App\Http\Controllers\PanierController::class, 'empty'])->name('panier.empty');

// Route pour la page validation

Route::get('validation', [App\Http\Controllers\PanierController::class, 'validation'])->name('validation');

Route::get('choixadresse', [App\Http\Controllers\PanierController::class, 'choixadresse'])->name('choixadresse');

Route::post('choixlivraison', [App\Http\Controllers\PanierController::class, 'choixlivraison'])->name('choixlivraison');

// Route dossier admin 

Route::get('admin/index', [App\Http\Controllers\AdminController::class, 'index'])->name('index');
