<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ProductListController;
use App\Http\Controllers\Admin\VisitorController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

////////////USER LOGIN API///////////////////

Route::post('/login', [AuthController::class, 'Login']);

Route::post('/register', [AuthController::class, 'Register']);

Route::get('/user', [UserController::class, 'User'])->middleware("auth:api");


////////////END USER LOGIN API//////////////



Route::get('/getvisitor', [VisitorController::class, 'GetVisitorDetails']);

Route::get('/getAllCategories', [CategoryController::class, 'GetAllCategories']);

Route::get('/getCategoriesById/{id}', [CategoryController::class, 'GetCategoriesById']);

Route::get('/getProductsById/{id}', [ProductListController::class, 'GetProductsById']);

Route::get('/getProductsByCategory/{id}', [ProductListController::class, 'GetProductListByCategory']);

Route::get('/getAllSubcategories', [CategoryController::class, 'GetAllSubcategories']);

Route::get('/getProductListByRemarks/{remarks}', [ProductListController::class, 'GetProductListByRemarks']);

// for search
Route::get('/search/{search_term}', [ProductListController::class, 'SearchProduct']);
