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

Route::group(['middleware' => 'auth.check'], function(){
    Route::get('/', [App\Http\Controllers\StockController::class, 'index']);
    Route::post('/', [App\Http\Controllers\StockController::class, 'store']);
});

Route::get('/news/moscow', [\App\Http\Controllers\MoscowNewsController::class, 'index']);
Route::get('/news/moscow/{id}', [\App\Http\Controllers\MoscowNewsController::class, 'show'])->name('news.moscow.show');

Route::get('/news/foreign', [\App\Http\Controllers\ForeignNewsController::class, 'index']);
Route::get('/news/foreign/{id}', [\App\Http\Controllers\ForeignNewsController::class, 'show'])->name('news.foreign.show');

Route::get('/stocks/moscow', [\App\Http\Controllers\MoscowStockController::class, 'index'])->name('stocks.moscow.index');

Route::get('/stocks/foreign', [\App\Http\Controllers\ForeignStockController::class, 'index'])->name('stocks.foreign.index');
Route::get('/stocks/foreign/{id}', [\App\Http\Controllers\ForeignStockController::class, 'show'])->name('stocks.foreign.show');

Auth::routes();

