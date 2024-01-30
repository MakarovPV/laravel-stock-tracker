<?php

namespace App\Http\Controllers\Api\Stocks;

use App\Helpers\Api\Stocks\Stock\Foreign\AlphavantageStock;
use Illuminate\Http\Request;

class ForeignStockCategoryController extends StockDataApiController
{
    public function __construct(AlphavantageStock $apiData)
    {
        parent::__construct($apiData);
    }

    /** Получение данных по API иностранной биржи.
     * @param Request $request
     * @return mixed
     */
    public function getData(Request $request) : mixed
    {
        $data = $request->query();
        return $this->apiData->getTickerDataFromApi($data);
    }
}
