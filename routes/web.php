<?php

require __DIR__.'/auth.php';
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\QuizAPIController;

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
    return view('auth.login');
});

Route::middleware(['auth'])->prefix('app')->group(function () {
    Route::get('/inicio', function () {
        return view('app.inicio');
    })->name('inicio');

    Route::get('/jogarquiz', [QuizAPIController::class, 'create'])->name('jogarquiz');

    Route::get('/criarquiz', function () {
        return view('app.criarquiz');
    })->name('criarquiz');

    Route::get('/ranking', function () {
        return view('app.ranking');
    })->name('ranking');
});