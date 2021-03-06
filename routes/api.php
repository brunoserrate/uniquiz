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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });
// Route::resource('quizzes', App\Http\Controllers\API\QuizAPIController::class);


Route::resource('categorias', App\Http\Controllers\API\CategoriaAPIController::class);


Route::resource('perguntas', App\Http\Controllers\API\PerguntaAPIController::class);


Route::resource('rankings', App\Http\Controllers\API\RankingAPIController::class);
