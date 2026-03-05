<?php

namespace App\Services\Stocks\Stock\Foreign;

use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class FinancialmodelingprepStock extends ForeignData
{
    /**
     * Получение списка зарубежных акций.
     *
     * @return array
     */
    public function getStockList(): array
    {
        $result = [];
        $array = Http::get($this->siteUrl . "api/v3/stock-screener", [
            'apikey' =>  $this->apiKey,
        ])->json();

        foreach ($array as $item) {
            $result[] = [
                'ticker' => $item['symbol'],
                'stock_name' => $item['companyName'],
                'sector' => $item['sector'],
            ];
        }

        $result = array_filter($result, function($array) {
            return !empty($array['ticker']) && !empty($array['stock_name']) && !empty($array['sector']);
        });

        return $result;
    }

    /**
     * Получение полной информации по конкретной акции.
     *
     * @param string $ticker
     * @return array
     */
    public function getStockInfoByTicker(int $stock_id, string $ticker): array
    {
        $cacheKey = "stock:info:{$stock_id}:{$ticker}";

        return Cache::remember($cacheKey, now()->addHours(6), function () use ($ticker, $stock_id){
            $response = Http::get($this->siteUrl . "api/v3/profile/{$ticker}", [
                'apikey' =>  $this->apiKey,
            ]);

            if ($response->failed()) {
                Log::warning("Ошибка с получением информации по {$ticker}", [
                    'status' => $response->status(),
                    'body'   => $response->body(),
                ]);
                return [];
            }

            $data = $response->json();
            $item = $data[0] ?? [];

            $result = [
                'stock_id'              => $stock_id,
                'ticker'                => $item['symbol'] ?? null,
                'price'                 => $item['price'] ?? null,
                'volatility'            => $item['beta'] ?? null,
                'capitalization'        => $item['mktCap'] ?? null,
                'last_dividends'        => $item['lastDiv'] ?? null,
                'changes'               => $item['changes'] ?? null,
                'company_name'          => $item['companyName'] ?? null,
                'currency'              => $item['currency'] ?? null,
                'exchange'              => $item['exchangeShortName'] ?? null,
                'industry'              => $item['industry'] ?? null,
                'website'               => $item['website'] ?? null,
                'description'           => $item['description'] ?? null,
                'ceo'                   => $item['ceo'] ?? null,
                'sector'                => $item['sector'] ?? null,
                'country'               => $item['country'] ?? null,
                'employees'             => $item['fullTimeEmployees'] ?? null,
                'phone'                 => $item['phone'] ?? null,
                'address'               => $item['address'] ?? null,
                'city'                  => $item['city'] ?? null,
                'state'                 => $item['state'] ?? null,
                'zip'                   => $item['zip'] ?? null,
                'dcf_price'             => $item['dcf'] ?? null,
                'dcf_price_difference'  => $item['dcfDiff'] ?? null,
            ];

            return $result;
        });
    }
}
