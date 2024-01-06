<?php

use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProductsController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteCategoryProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [DashboardController::class,'index'])->name('index');

// DB Categories

Route::get('/CategoriesList', [CategoriesController::class,'CategoriesList'])->name('CategoryList');
Route::get('/CategoriesInsert', [CategoriesController::class,'insert'])->name('CategoryInsert');
Route::post('/CategoriesStore', [CategoriesController::class,'Store']);
Route::get('/Categoriesedit/{id}', [CategoriesController::class,'edit']);
Route::post('/Categoriesupdate/{id}', [CategoriesController::class,'update']);
Route::get('/Categoriesdelete/{id}', [CategoriesController::class,'delete']);

// DB Products 
Route::get('/DbProducts', [ProductsController::class,'productsList'])->name('DbProduct');
Route::get('/ProductsInsert', [ProductsController::class,'insert'])->name('ProductInsert');
Route::post('/ProductsStore', [ProductsController::class,'Store']);
Route::get('/Productsedit/{id}', [ProductsController::class,'edit']);
Route::post('/Productsupdate/{id}', [ProductsController::class,'update']);
Route::get('/Productsdelete/{id}', [ProductsController::class,'delete']);


