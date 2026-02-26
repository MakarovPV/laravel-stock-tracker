<?php

namespace App\Http\Controllers\Api\Stocks;

use App\Services\Stocks\Crypt\CryptocompareCrypt;
use Illuminate\Http\Request;

class CryptoCategoryController extends StockDataApiController
{
    public function __construct(
        private CryptocompareCrypt $cryptocompareCrypt
    ) {}

    /**
     * Получение данных по API криптовалюты.
     *
     * @param Request $request
     * @return mixed
     */
    public function getData(Request $request): mixed
    {
        $data = $request->query();
        return $this->cryptocompareCrypt->getTickerDataFromApi($data);
    }
}
