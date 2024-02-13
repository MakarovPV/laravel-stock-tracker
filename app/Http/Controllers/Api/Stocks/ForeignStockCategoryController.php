<?php

namespace App\Http\Controllers\Api\Stocks;

use App\Helpers\Api\Stocks\Stock\Foreign\AlphavantageStock;
use App\Helpers\Api\Stocks\Stock\Foreign\FinancialmodelingprepStock;
use Illuminate\Http\Request;

class ForeignStockCategoryController extends StockDataApiController
{
    private AlphavantageStock $alphavantageStock;
    private FinancialmodelingprepStock $financialmodelingprepStock;

    public function __construct()
    {
        $this->alphavantageStock = new AlphavantageStock();
        $this->financialmodelingprepStock = new FinancialmodelingprepStock();
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

    /**
     * Получение полной информации по конкретной акции.
     *
     * @param int $stock_id
     * @param string $ticker
     * @return array
     */
    public function getStockInfo(int $stock_id, string $ticker): array
    {
        $stockInfo = $this->financialmodelingprepStock->getStockInfoByTicker($ticker);
        $stockInfo['stock_id'] = $stock_id;

        return $stockInfo;
    }
}
