<?php

namespace App\Http\Controllers\Api\Stocks;

use App\Helpers\Api\Stocks\Crypt\CryptocompareCrypt;
use Illuminate\Http\Request;

class CryptoCategoryController extends StockDataApiController
{
    private CryptocompareCrypt $cryptocompareCrypt;

    public function __construct(CryptocompareCrypt $cryptocompareCrypt)
    {
        $this->cryptocompareCrypt = $cryptocompareCrypt;
    }

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
