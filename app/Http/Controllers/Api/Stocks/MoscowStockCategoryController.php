<?php

namespace App\Http\Controllers\Api\Stocks;

use App\Services\Stocks\Stock\Moscow\ImoexStock;
use Illuminate\Http\Request;

class MoscowStockCategoryController extends StockDataApiController
{
    private ImoexStock $imoexStock;

    public function __construct(ImoexStock $imoexStock)
    {
        $this->imoexStock = $imoexStock;
    }

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
