<?php

namespace App\Http\Controllers\Api\Stocks;

use App\Services\Stocks\Stock\Foreign\AlphavantageStock;
use App\Services\Stocks\Stock\Foreign\FinancialmodelingprepStock;
use Illuminate\Http\Request;

class ForeignStockCategoryController extends StockDataApiController
{
    public function __construct(
        private AlphavantageStock $alphavantageStock
    ) {}

    /**
     * Получение данных по API иностранной биржи.
     *
     * @param Request $request
     * @return mixed
     */
    public function getData(Request $request): mixed
    {
        $data = $request->query();
        return $this->alphavantageStock->getTickerDataFromApi($data);
    }
}
