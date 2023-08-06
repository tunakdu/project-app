<?php

use App\Http\Controllers\Api\RecipeController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\UserController;
use App\Http\Controllers\API\FreezerController;
use App\Http\Controllers\Api\FreezerProductController;
use App\Http\Controllers\Api\ProductController;
use App\Http\Controllers\Api\CommentController;

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

Route::controller(UserController::class)->group(function(){
    Route::post('login','loginUser');
});



Route::middleware('auth:api')->group(function(){

    Route::controller(UserController::class)->group(function(){

        Route::get('user','getUserDetail');
        Route::get('logout','userLogout');

    });

    Route::get('/freezers', [FreezerController::class, 'index']);
    Route::post('/freezers/create', [FreezerController::class, 'store']);
    Route::get('/freezers/show/{id}', [FreezerController::class, 'show']);
    Route::delete('/freezers/delete/{id}', [FreezerController::class, 'destroy']);
    Route::post('/freezers/update/{id}', [FreezerController::class, 'update']);
    Route::post('/freezers/search', [FreezerController::class, 'search']);

    Route::get('/products', [ProductController::class, 'index']);
    Route::post('/products/create', [ProductController::class, 'store']);
    Route::get('/products/show/{id}', [ProductController::class, 'show']);
    Route::delete('/products/delete/{id}', [ProductController::class, 'destroy']);
    Route::post('/products/update/{id}', [ProductController::class, 'update']);
    Route::post('/products/search', [ProductController::class, 'search']);

    Route::get('/freezer-products/{freezerID}', [FreezerProductController::class, 'index']);
    Route::post('/freezer-products/create', [FreezerProductController::class, 'store']);
    Route::get('/freezer-products/show/{id}', [FreezerProductController::class, 'show']);
    Route::delete('/freezer-products/delete/{id}', [FreezerProductController::class, 'destroy']);
    Route::post('/freezer-products/update/{id}', [FreezerProductController::class, 'update']);

    Route::get('/recipes', [RecipeController::class, 'index']);
    Route::post('/recipes/create', [RecipeController::class, 'store']);
    Route::get('/recipes/show/{id}', [RecipeController::class, 'show']);
    Route::delete('/recipes/delete/{id}', [RecipeController::class, 'destroy']);
    Route::post('/recipes/update/{id}', [RecipeController::class, 'update']);
    Route::post('/recipes/search', [RecipeController::class, 'search']);
    Route::post('/recipes/randomRecipe/{freezerID}', [RecipeController::class, 'randomRecipe']);

    Route::get('/comment', [CommentController::class, 'index']);
    Route::post('/comment/create', [CommentController::class, 'store']);
    Route::get('/comment/show/{id}', [CommentController::class, 'show']);
    Route::delete('/comment/delete/{id}', [CommentController::class, 'destroy']);
    Route::post('/comment/update/{id}', [CommentController::class, 'update']);

});




