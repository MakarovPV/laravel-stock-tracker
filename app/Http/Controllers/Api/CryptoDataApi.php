<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;

class CryptoDataApi implements StockDataApi
{
    /** Получение данных по API криптовалюты.
     * @param Request $request
     * @return mixed
     */
    public function getDataFromApi(Request $request) : mixed
    {
        $data = $request->query();
        $cacheKey = $data['ticker'] . '_' . $data['interval'];

        $result = Cache::remember($cacheKey, 3600, function () use ($data){
            return Http::get("https://min-api.cryptocompare.com/data/v2/{$data['segment']}", [
                'fsym' => $data['ticker'],
                'tsym' => 'rub',
                'aggregate' => $data['interval'],
                'limit' => $data['limit'],
            ])->throw()->json();
        });

        return $result;
    }
}
