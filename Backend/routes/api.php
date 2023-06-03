<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\BukuController;
use App\Http\Controllers\RecipeController;
use App\Http\Controllers\UserController;

Route::post('register', [AuthController::class, 'register']);
Route::post('login',[AuthController::class,'login']);
Route::get('books',[RecipeController::class,'show_books']);
Route::post('recipes/get-recipe',[RecipeController::class,'recipe_by_id']);
Route::post('recipes/rating',[RecipeController::class,'rating']);
Route::get('buku',[BukuController::class, 'show_buku']);
Route::post('buku/get-buku',[BukuController::class,'buku_by_id']);
Route::post('buku/pesanan',[BukuController::class, 'pesanan']);



Route::middleware(['admin.api'])->prefix('admin')->group(function(){

    Route::post('register',[AdminController::class, 'register']);
    Route::get('register',[AdminController::class, 'show_register']);
    Route::get('register/{id}',[AdminController::class, 'show_register_by_id']);
    Route::put('register/{id}',[AdminController::class, 'update_register']);
    Route::delete('register/{id}',[AdminController::class, 'delete_register']);
    
    Route::get('activation-account/{id}',[AdminController::class, 'activation_account']);
    Route::get('deactivation-account/{id}',[AdminController::class, 'deactivation_account']);

    Route::post('create-buku', [AdminController::class,'create_buku']);
    Route::post('update-buku/{id}', [AdminController::class,'update_buku']);
    Route::delete('delete-buku/{id}', [AdminController::class,'delete_buku']);
    Route::get('publish/{id}', [AdminController::class,'publish_buku']);
    Route::get('unpublish/{id}', [AdminController::class,'unpublish_buku']);


    
});

Route::middleware(['user.api'])->prefix('user')->group(function(){

    Route::post('submit-recipe', [UserController::class, 'create_recipe']);
});

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/


