<?php

namespace App\Http\Controllers\Api\Stocks;

use App\Http\Controllers\Api\ApiController;
use App\Http\Requests\StockDataRequest;

abstract class StockDataApiController extends ApiController
{
    /**
     * Получение данных по API.
     *
     * @param StockDataRequest $request
     * @return mixed
     */
    abstract public function getData(StockDataRequest $request): mixed;
}
