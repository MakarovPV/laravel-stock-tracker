<?php

namespace App\Services\Stocks\Stock\Moscow;

use App\Utilities\Dates\StartDateFactory;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class ImoexStock extends MoscowData
{
    /**
     * Получение данных по стоимости акции за указанный период.
     *
     * @param array $data
     * @return mixed
     */
    public function getTickerDataFromApi(array $data): mixed
    {
        $cacheKey = "stock:pricePerDate:{$data['ticker']}:{$data['interval']}";

        return Cache::remember($cacheKey, now()->addHour(), function () use ($data){
            $date = (new StartDateFactory($data['segment']))->selectInterval();
            $response = Http::get($this->siteUrl . "iss/engines/stock/markets/shares/securities/{$data['ticker']}/candles.json", [
                'iss.meta' => 'off',
                'interval' => $data['interval'],
                'from' => $date,
            ]);

            if ($response->failed()) {
                Log::warning("Проблемы с получением данных московской биржи", [
                    'status'   => $response->status(),
                    'body'     => $response->body(),
                ]);

                return [];
            }

            return $response->json('candles.data', []);
        });
    }

    /**
     * Получение списка существующих на московской бирже индексов.
     *
     * @return array
     */
    public function getIndicesListFromApi(): array
    {
        $result = [];
        $array = Http::get($this->siteUrl . "iss/statistics/engines/stock/markets/index/analytics.json",
            [
                'iss.meta' => 'off',
                'indices.columns' => 'indexid, shortname',
                'iss.only' => 'indices'
            ])['indices'];
        $array['columns'][0] = 'index_name';
        $array['columns'][1] = 'short_name';

        foreach ($array['data'] as $val){
            if (strpos($val[0], 'RU') !== false || strpos($val[0], 'RGBI') !== false || strpos($val[1], 'Индекс') === false) continue;
            $result[] = array_combine($array['columns'], $val);
        }

        return $result;
    }

    /**
     * Получение списка акций, которые входят в указанный индекс.
     *
     * @param string $index
     * @return array
     */
    public function getStockListFromApiByIndex(string $index = 'imoex'): array
    {
        $result = [];
        $array = Http::get($this->siteUrl . "iss/statistics/engines/stock/markets/index/analytics/{$index}.json",
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

    /**
     * Получение списка индексов, в которые входит указанный тикер акции.
     *
     * @param string $ticker
     * @return array
     */
    public function getIndicesListForTickerFromApi(string $ticker): array
    {
        $result = Http::get($this->siteUrl . "iss/securities/{$ticker}/indices.json",
            [
                'iss.meta' => 'off',
                'indices.columns' => 'SECID',
            ])['indices']['data'];

        $result = collect($result)->flatten();

        return $result->toArray();
    }
}
