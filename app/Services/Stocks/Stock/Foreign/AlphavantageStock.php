<?php

namespace App\Services\Stocks\Stock\Foreign;

use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;

class AlphavantageStock extends ForeignData
{
    /**
     * Получение данных по стоимости акции за указанный период.
     *
     * @param array $data
     * @return mixed
     */
    public function getTickerDataFromApi(array $data): mixed
    {
        $cacheKey = $data['ticker'] . '_' . $data['interval'];

        $result = Cache::remember($cacheKey, 3600, function () use ($data){
            return Http::get($this->siteUrl . "query", [
                'function' => "time_series_{$data['segment']}",
                'symbol' => $data['ticker'],
                'market' => 'usd',
                'interval' => $data['interval'] . 'min',
                'apikey' => $this->apiKey,
            ])->throw()->json();
        });

        return $result;
    }
}
