<?php

namespace App\Helpers\Api\Stocks\Stock\Foreign;

use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;

class AlphavantageStock extends ForeignData
{
    public function getTickerDataFromApi(array $data) : mixed
    {
        $cacheKey = $data['ticker'] . '_' . $data['interval'];

        $result = Cache::remember($cacheKey, 3600, function () use ($data){
            return Http::get($this->siteUrl . "query", [
                'function' => "time_series_{$data['segment']}",
                'symbol' => $data['ticker'],
                'market' => 'usd',
                'interval' => $data['interval'] . 'min',
                'apiKey' => $this->apiKey,
            ])->throw()->json();
        });

        return $result;
    }
}
