<?php

use Illuminate\Support\Facades\Route;

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
use App\Http\Controllers\ProductController;


Route::get('/', [ProductController::class, 'home']);
Route::get('/dashboard', [ProductController::class, 'dashboard']);
Route::get('/criar', [ProductController::class, 'create']);
Route::post('/dashboard', [ProductController::class, 'store']);
Route::get('/editar/{id}', [ProductController::class, 'editar']);
Route::put('/editar/{id}', [ProductController::class, 'update']);
Route::get('/deletar/{id}', [ProductController::class, 'delete']);
Route::delete('/deletar/{id}', [ProductController::class, 'destroy']);


Route::get('/detalhes', function () {
    return view('detail');
});
Route::get('/detalhes/{id}', [ProductController::class, 'productDetail']);