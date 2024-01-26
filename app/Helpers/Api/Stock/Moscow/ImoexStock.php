<?php

namespace App\Helpers\Api\Stock\Moscow;

use App\Modules\StartDateSetting;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;

class ImoexStock extends MoscowData
{
    public function getTickerDataFromApi(array $data) : mixed
    {
        $cacheKey = $data['ticker'] . '_' . $data['interval'];

        $date = (new StartDateSetting($data['segment']))->selectInterval();

        $result = Cache::remember($cacheKey, 3600, function () use ($data, $date){
            return Http::get($this->siteUrl . "iss/engines/stock/markets/shares/securities/{$data['ticker']}/candles.json", [
                'iss.meta' => 'off',
                'interval' => $data['interval'],
                'from' => $date,
            ])->throw()->json('candles.data');
        });

        return $result;
    }

    public function getStockListFromApi(): array
    {
        $result = [];
        $array = Http::get("https://iss.moex.com/iss/statistics/engines/stock/markets/index/analytics/imoex.json",
            [
                'limit' => '100',
                'iss.meta' => 'off',
                'analytics.columns' => 'ticker, shortnames',
                'iss.only' => 'analytics'
            ])['analytics'];
        $array['columns'][1] = 'stock_name';

        foreach ($array['data'] as $val){
            $result[] = array_combine($array['columns'], $val);
        }

        return $result;
    }
}
