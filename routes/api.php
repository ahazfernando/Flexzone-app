<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\ItemController;
use App\Http\Controllers\Api\CategoryController;
use App\Http\Controllers\Api\OrderController;
use App\Http\Controllers\Api\CartController;
use App\Http\Controllers\Api\UserController;


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/auth/register', [AuthController::class, 'createUser']);
Route::post('/auth/login', [AuthController::class, 'loginUser']);


Route::get('/categories', [CategoryController::class, 'index']);
Route::post('/categories', [CategoryController::class, 'store']);
Route::get('/categories/{id}', [CategoryController::class, 'show']);
Route::put('/categories/update/{id}', [CategoryController::class, 'update']);
Route::delete('/cart/delete/{id}', [CategoryController::class, 'delete']);

Route::get('/items', [ItemController::class, 'index']);
Route::post('/items', [ItemController::class, 'store']);
Route::get('/items/{id}', [ItemController::class, 'show']);
Route::put('/items/update/{id}', [ItemController::class, 'update']);
Route::delete('/items/delete/{id}', [ItemController::class, 'delete']);

Route::get('/orders', [OrderController::class, 'index']);
Route::post('/orders', [OrderController::class, 'store']);
Route::get('/orders/{id}', [OrderController::class, 'show']);
Route::put('/orders/update/{id}', [OrderController::class, 'update']);
Route::delete('/order/delete/{id}', [OrderController::class, 'delete']);

Route::get('/carts', [CartController::class, 'index']);
Route::post('/carts', [CartController::class, 'store']);
Route::get('/carts/{id}', [CartController::class, 'show']);
Route::put('/carts/update/{id}', [CartController::class, 'update']);
Route::delete('/carts/delete/{id}', [CartController::class, 'delete']);

Route::get('/users', [UserController::class, 'index']);
Route::post('/users', [UserController::class, 'store']);
Route::get('/users/{id}', [UserController::class, 'show']);
Route::put('/users/update/{id}', [UserController::class, 'update']);
Route::delete('/users/delete/{id}', [UserController::class, 'delete']);
