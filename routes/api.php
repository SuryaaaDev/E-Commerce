<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\Api\AdminApiController;
use App\Http\Controllers\Api\CommentApiController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

// Route::apiResource('comments', CommentApiController::class);
Route::get('/comments', [CommentApiController::class, 'index']);
Route::post('/comment/add', [CommentApiController::class, 'store']);

Route::get('/dashboard', [AdminApiController::class, 'dashboard']);

Route::get('/users', [AdminApiController::class, 'allUser']);
Route::delete('/user/{id}', [AdminApiController::class, 'destroyUser']);

Route::get('/products', [AdminApiController::class, 'index']);
Route::post('/products', [AdminApiController::class, 'store']);
Route::get('/products/{id}', [AdminApiController::class, 'show']);
Route::put('/products/{id}', [AdminApiController::class, 'update']);
Route::delete('/products/{id}', [AdminApiController::class, 'destroy']);
