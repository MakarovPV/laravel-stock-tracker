<?php

namespace App\Http\Controllers\Api\Stocks;

use App\Helpers\Api\Stocks\Stock\Moscow\ImoexStock;
use Illuminate\Http\Request;

class MoscowStockCategoryController extends StockDataApiController
{
    public function __construct(ImoexStock $apiData)
    {
        parent::__construct($apiData);
    }

    /** Получение данных по API московской биржи.
     * @param Request $request
     * @return mixed
     */
    public function getData(Request $request) : mixed
    {
        $data = $request->query();
        return $this->apiData->getTickerDataFromApi($data);
    }
}
