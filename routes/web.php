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

Route::get('/news', [\App\Http\Controllers\MoscowNewsController::class, 'index']);

Auth::routes();

