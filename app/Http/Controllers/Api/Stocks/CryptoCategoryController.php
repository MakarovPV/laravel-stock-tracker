<?php

namespace App\Http\Controllers\Api\Stocks;

use App\Services\Stocks\Crypt\CryptocompareCrypt;
use App\Http\Requests\StockDataRequest;

class CryptoCategoryController extends StockDataApiController
{
    public function __construct(
        private CryptocompareCrypt $cryptocompareCrypt
    ) {}

    /**
     * Получение данных по API криптовалюты.
     *
     * @param StockDataRequest $request
     * @return mixed
     */
    public function getData(StockDataRequest $request): mixed
    {
        $data = $request->validated();
        return $this->cryptocompareCrypt->getTickerDataFromApi($data);
    }
}
