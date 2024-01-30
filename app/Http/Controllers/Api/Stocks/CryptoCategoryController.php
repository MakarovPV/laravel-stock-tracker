<?php

namespace App\Http\Controllers\Api\Stocks;

use App\Helpers\Api\Stocks\Crypt\CryptocompareCrypt;
use Illuminate\Http\Request;

class CryptoCategoryController extends StockDataApiController
{
    public function __construct(CryptocompareCrypt $apiData)
    {
        parent::__construct($apiData);
    }

    /** Получение данных по API криптовалюты.
     * @param Request $request
     * @return mixed
     */
    public function getData(Request $request) : mixed
    {
        $data = $request->query();
        return $this->apiData->getTickerDataFromApi($data);
    }
}
