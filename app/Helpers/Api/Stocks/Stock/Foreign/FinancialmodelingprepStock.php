<?php

namespace App\Helpers\Api\Stocks\Stock\Foreign;

use Illuminate\Support\Facades\Http;

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

        return $result;
    }

    /**
     * Получение полной информации по конкретной акции.
     *
     * @param string $ticker
     * @return array
     */
    public function getStockInfoByTicker(string $ticker): array
    {
        $result = [];
        $array = Http::get($this->siteUrl . "api/v3/profile/{$ticker}", [
            'apikey' =>  $this->apiKey,
        ])->json();

        foreach ($array as $item){
            $result = [
                'ticker' => $item['symbol'],
                'price' => $item['price'],
                'volatility' => $item['beta'],
                'capitalization' => $item['mktCap'],
                'last_dividends' => $item['lastDiv'],
                'changes' => $item['changes'],
                'company_name' => $item['companyName'],
                'currency' => $item['currency'],
                'exchange' => $item['exchangeShortName'],
                'industry' => $item['industry'],
                'website' => $item['website'],
                'description' => $item['description'],
                'ceo' => $item['ceo'],
                'sector' => $item['sector'],
                'country' => $item['country'],
                'employees' => $item['fullTimeEmployees'],
                'phone' => $item['phone'],
                'address' => $item['address'],
                'city' => $item['city'],
                'state' => $item['state'],
                'zip' => $item['zip'],
                'dcf_price' => $item['dcf'],
                'dcf_price_difference' => $item['dcfDiff'],
            ];
        }

        return $result;
    }
}
