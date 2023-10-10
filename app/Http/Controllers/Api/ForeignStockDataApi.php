<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;

class ForeignStockDataApi implements StockDataApi
{
    //API-ключ для иностранной биржи
    private $apikey = 'GQ12XD7I4I34URYY';

    //Получение данных по API иностранной биржи.
    public function getDataFromApi(Request $request) : mixed
    {
        $data = $request->query();
        $cacheKey = $data['ticker'] . '_' . $data['interval'];

        $result = Cache::remember($cacheKey, 3600, function () use ($data){
            return Http::get("https://www.alphavantage.co/query", [
                'function' => "time_series_{$data['segment']}",
                'symbol' => $data['ticker'],
                'market' => 'usd',
                'interval' => $data['interval'] . 'min',
                'apikey' => $this->apikey,
            ])->throw()->json();
        });

        return $result;
    }
}
