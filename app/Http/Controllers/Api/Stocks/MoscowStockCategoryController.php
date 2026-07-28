<?php

namespace App\Http\Controllers\Api\Stocks;

use App\Http\Requests\StockDataRequest;
use App\Services\Stocks\Stock\Moscow\ImoexStock;

class MoscowStockCategoryController extends StockDataApiController
{
    public function __construct(
        private ImoexStock $imoexStock
    ) {}

    /**
     * Получение данных по API московской биржи.
     *
     * @param StockDataRequest $request
     * @return mixed
     */
    public function getData(StockDataRequest $request): mixed
    {
        $data = $request->validated();
        return $this->imoexStock->getTickerDataFromApi($data);
    }
}
