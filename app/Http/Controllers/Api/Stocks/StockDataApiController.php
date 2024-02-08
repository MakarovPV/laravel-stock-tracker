<?php

namespace App\Http\Controllers\Api\Stocks;

use App\Helpers\Api\ApiData;
use App\Http\Controllers\Api\ApiController;
use Illuminate\Http\Request;

abstract class StockDataApiController extends ApiController
{
    /** Получение данных по API
     * @param Request $request
     * @return mixed
     */
    abstract public function getData(Request $request) : mixed;
}
