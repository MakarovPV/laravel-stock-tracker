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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/moscow', [\App\Http\Controllers\Api\Stocks\MoscowStockCategoryController::class, 'getData'])->name('moscow.stocks');
Route::get('/foreign', [\App\Http\Controllers\Api\Stocks\ForeignStockCategoryController::class, 'getData'])->name('foreign.stocks');
Route::get('/crypto', [\App\Http\Controllers\Api\Stocks\CryptoCategoryController::class, 'getData'])->name('cryptocurrency.stocks');
