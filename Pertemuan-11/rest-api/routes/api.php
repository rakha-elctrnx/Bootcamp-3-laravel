<?php

use App\Http\Controllers\ProductController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
    Route::get('/list', 'index')->name('index');
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::controller(ProductController::class)->prefix('products')->name('products')->group(function () {
    Route::get('/list', 'index');
    Route::get('/detail/{id}', 'show');
    Route::post('/add', 'add');
    Route::put('/edit/{id}', 'update');
    Route::get('/delete/{id}', 'delete');
});
