<?php

namespace App\Http\Controllers\Api\Stocks;

use App\Services\Stocks\Stock\Foreign\AlphavantageStock;
use App\Services\Stocks\Stock\Foreign\FinancialmodelingprepStock;
use Illuminate\Http\Request;

class ForeignStockCategoryController extends StockDataApiController
{
    private AlphavantageStock $alphavantageStock;

    public function __construct(AlphavantageStock $alphavantageStock)
    {
        $this->alphavantageStock = $alphavantageStock;
    }

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
