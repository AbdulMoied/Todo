<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

/*  Todo Api Routes */

Route::get('/todo/{id}', [App\Http\Controllers\TodoController::class, 'show']);
Route::get('/todos', [App\Http\Controllers\TodoController::class, 'index']);
Route::post('/todo', [App\Http\Controllers\TodoController::class, 'store']);
Route::patch('/todo/{id}',[App\Http\Controllers\TodoController::class, 'update']);
Route::delete('/todo/{id}',[App\Http\Controllers\TodoController::class, 'destroy']);


