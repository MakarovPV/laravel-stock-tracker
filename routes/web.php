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

Route::group(['prefix' => 'news'], function () {

    Route::group(['prefix' => 'moscow'], function () {
        Route::get('/', [\App\Http\Controllers\MoscowNewsController::class, 'index']);
        Route::get('/{id}', [\App\Http\Controllers\MoscowNewsController::class, 'show'])->name('news.moscow.show');
    });

    Route::group(['prefix' => 'foreign'], function () {
        Route::get('/', [\App\Http\Controllers\ForeignNewsController::class, 'index']);
        Route::get('/{id}', [\App\Http\Controllers\ForeignNewsController::class, 'show'])->name('news.foreign.show');
    });

});

Route::group(['prefix' => 'stocks'], function () {

    Route::group(['prefix' => 'moscow'], function () {
        Route::get('/', [\App\Http\Controllers\MoscowStockController::class, 'index'])->name('stocks.moscow.index');
    });

    Route::group(['prefix' => 'foreign'], function () {
        Route::get('/', [\App\Http\Controllers\ForeignStockController::class, 'index'])->name('stocks.foreign.index');
        Route::get('/{id}', [\App\Http\Controllers\ForeignStockController::class, 'show'])->name('stocks.foreign.show');
    });

});

Auth::routes();

