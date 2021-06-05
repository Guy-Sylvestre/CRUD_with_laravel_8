<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\ProductController;
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

Route::get('/', [PagesController::class, 'home']);

Route::get('/apropos', [PagesController::class, 'apropos']);

Route::get('/services', [PagesController::class, 'services']);

#Afficher les détails d'un produit en fonctionde son ID
Route::get('/show/{id}', [PagesController::class, 'show']);

Route::get('/create', [PagesController::class, 'create']);

#Sauvergader les données à l'aide de formulaire
Route::post('/saveproduct', [PagesController::class, 'saveproduct']);

#Recupérer les information relative à l'ID du fruit
Route::get('/edit/{id}', [PagesController::class, 'edit']);

#Modifier un produit depuis le font end en rapport avec la base de données
Route::post('/editproduct', [PagesController::class, 'editproduct']);

#Supprimer un produit depuis le font end en rapport avec la base de données
Route::get('/delete/{id}', [PagesController::class, 'delete']);


Route::resource('/products', ProductController::class);