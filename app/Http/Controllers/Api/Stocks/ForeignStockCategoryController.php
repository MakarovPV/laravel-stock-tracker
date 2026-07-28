<?php

namespace App\Http\Controllers\Api\Stocks;

use App\Http\Requests\StockDataRequest;
use App\Services\Stocks\Stock\Foreign\AlphavantageStock;

class ForeignStockCategoryController extends StockDataApiController
{
    public function __construct(
        private AlphavantageStock $alphavantageStock
    ) {}

    /**
     * Получение данных по API иностранной биржи.
     *
     * @param StockDataRequest $request
     * @return mixed
     */
    public function getData(StockDataRequest $request): mixed
    {
        $data = $request->validated();
        return $this->alphavantageStock->getTickerDataFromApi($data);
    }
}
