<?php

namespace App\Http\Controllers\Api\Stocks;

use App\Services\Stocks\Stock\Moscow\ImoexStock;
use Illuminate\Http\Request;

class MoscowStockCategoryController extends StockDataApiController
{
    public function __construct(
        private ImoexStock $imoexStock
    ) {}

    /**
     * Получение данных по API московской биржи.
     *
     * @param Request $request
     * @return mixed
     */
    public function getData(Request $request): mixed
    {
        $data = $request->query();
        return $this->imoexStock->getTickerDataFromApi($data);
    }
}
